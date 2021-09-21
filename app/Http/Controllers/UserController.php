<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Auth;
use App\Model\Unidade;
use Spatie\Permission\Models\Role;
use App\Model\ProcessoSeletivo;
use DB;
use Hash;
use Validator;
use Mail;

class UserController extends Controller
{
	public function __construct(Unidade $unidade)
	{
		$this->unidade = $unidade;
	}
	
	// Página Index Usuário //
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

	// Página Create Usuário //
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
	
	// Tela de Login //
	public function telaLogin()
	{
		$text = false;
		return view('auth.login', compact('text'));
	}

	// Tela de Registro Usuário //
	public function telaRegistro()
	{
		$text = false;
		return view('auth.register', compact('text'));
	}
	
	// Tela Email //
	public function telaEmail()
	{
		return view('auth.passwords.email');
	}

	
	// Tela Resetar Senha Usuário //
	public function telaReset()
	{
		$text = false;
		$token = '';
		return view('auth.passwords.reset', compact('text','token'));
	}

	public function emailReset(Request $request)
	{   
		$input = $request->all(); 
		$email = $input['email'];
		$usuarios = User::where('email',$email)->get();
		$qtd = sizeof($usuarios);
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
		]);	
		$email2 = 'ilton.albuquerque@hcpgestao.org.br';
		if($qtd > 0){
			Mail::send('email.emailReset', [], function($m) use ($email,$email2) {
				$m->from('ilton.albuquerque@hcpgestao.org.br', 'PORTAL DO PROCESSO SELETIVO');
				$m->subject('Solicitação de Alteração de Senha');
				$m->to($email);
				$m->cc($email2);
			});		

			$validator = 'ABRA SUA CAIXA DE E-MAIL PARA VALIDAR SUA SENHA NOVA';
			return view('auth.passwords.email', compact('email','usuarios'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
		}else{ 
			$validator = 'Este E-mail não foi cadastrado no Portal do Processo Seletivo.';
			return view('auth.passwords.email', compact('email','usuarios'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
		}
	}
	
	// Login Usuário //
	public function Login(Request $request)
	{ 
		$input = $request->all(); 		
		$v = \Validator::make($request->all(), [
			'email'    => 'required|email',
            'password' => 'required'
		]);		
		if ($v->fails()) {
			$failed = $v->failed(); 
			if ( !empty($failed['email']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo e-mail é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['email']['Email']) ) {
				\Session::flash('mensagem', ['msg' => 'Este e-mail é inválido!','class'=>'green white-text']);
			} else if ( !empty($failed['password']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo nome é obrigatório!','class'=>'green white-text']);
			}
			$text = true;
			return view('/', compact('text')); 
		} else {
			$email = $input['email'];
			$senha = Hash::make($input['password']);		
			$user = User::where('email', $email)->where('password',$senha)->get();
			$qtd = sizeof($user); 			
			if ( $qtd == 0 ) {
				\Session::flash('mensagem', ['msg' => 'Login Inválido!','class'=>'green white-text']);
				$text = true;
				$unidades = Unidade::all();
				return view('telaLogin', compact('unidades','user')); 						
			} else {
				$text = true;
				$unidades = $this->unidade->all();
				Auth::login($user);
				return view('home', compact('unidades','user')); 						
			}
		}
	}
	
	// Resetar Senha Usuário //
	public function resetarSenha(Request $request)
	{ 
		$input = $request->all();		
		$v = \Validator::make($request->all(), [
			'email'    => 'required|email',
            'password' => 'required|same:password_confirmation',
			'password_confirmation' => 'required'
    	]);		
		if ($v->fails()) {
			$failed = $v->failed(); 
			if ( !empty($failed['email']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo e-mail é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['email']['Email']) ) {
				\Session::flash('mensagem', ['msg' => 'Este e-mail é inválido!','class'=>'green white-text']);
			} else if ( !empty($failed['password']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo nome é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['password']['Same']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo senha e confirmar senha não são iguais!','class'=>'green white-text']);
			} else if ( !empty($failed['password_confirmation']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo confirmar senha é obrigatório!','class'=>'green white-text']);
			} 
			$text = true;
			return view('auth.passwords/reset', compact('text'));
		} else {
			if(!empty($input['password'])){ 
				$input['password'] = Hash::make($input['password']);
			}else{
				$input = array_except($input,array('password'));    
			}
			$email = $input['email'];
			$user = User::where('email', $email)->get();
			$qtd = sizeof($user);
			if($qtd == 0){
				$text = true;
				\Session::flash('mensagem', ['msg' => 'Usuário não cadastrado!','class'=>'green white-text']);
				return view('auth.passwords/reset', compact('text')); 						
			}
			$idUser = $user[0]->id;
			$user = User::find($idUser);
			$user->update($input);
			$text = true;
			\Session::flash('mensagem', ['msg' => 'Senha alterado com sucesso!','class'=>'green white-text']);
			return view('auth/login', compact('text')); 						
		}
	}
	
	// Salvar Novo Usuário //
    public function store(Request $request)
    {
		$input = $request->all();
		$v = \Validator::make($request->all(), [
			'name'     		   => 'required',
            'email'    		   => 'required|email|unique:users,email',
            'password' 		   => 'required|same:password_confirmation',
			'password_confirmation' => 'required'
    	]);			 
		if ($v->fails()) {
			$failed = $v->failed(); 
			if ( !empty($failed['name']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo nome é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['email']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo e-mail é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['email']['Email']) ) {
				\Session::flash('mensagem', ['msg' => 'Este e-mail é inválido!','class'=>'green white-text']);
			} else if ( !empty($failed['email']['Unique']) ) {
				\Session::flash('mensagem', ['msg' => 'Este e-mail já foi cadastrado!','class'=>'green white-text']);
			} else if ( !empty($failed['password']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo nome é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['password']['Same']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo senha e confirmar senha não são iguais!','class'=>'green white-text']);
			} else if ( !empty($failed['password_confirmation']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo confirmar senha é obrigatório!','class'=>'green white-text']);
			} else if ( !empty($failed['roles']['Required']) ) {
				\Session::flash('mensagem', ['msg' => 'O campo confirmar senha é obrigatório!','class'=>'green white-text']);
			}
			$text = true;
			return view('auth.register', compact('text'));
		} else {
			$input['password'] = Hash::make($input['password']);
			$user = User::create($input);
			\Session::flash('mensagem', ['msg' => 'Usuário cadastrado com sucesso!','class'=>'green white-text']);
			$unidades = $this->unidade->all();
			$text = true;
			$processos = ProcessoSeletivo::all();
			return view('home', compact('text','processos')); 						
		}
    }

	// Tela Exibir Usuário //
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

	// Tela Editar Usuário //
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

	// Alterar Usuário //
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

	// Excluir Usuário //
	public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}