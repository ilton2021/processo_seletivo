<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Auth;
use App\Model\Unidade;
use App\Model\AlterarSenha;
use Spatie\Permission\Models\Role;
use App\Model\ProcessoSeletivo;
use DB;
use Hash;
use Validator;
use Str;
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
		return view('auth.login');
	}

	// Tela de Registro Usuário //
	public function telaRegistro()
	{
		return view('auth.register');
	}
	
	// Tela Email //
	public function telaEmail()
	{
		return view('auth.passwords.email');
	}

	
	// Tela Resetar Senha Usuário //
	public function telaReset()
	{
		$token = '';
		return view('auth.passwords.reset', compact('token'));
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
		if($validator->fails()){
			return view('auth.passwords.email', compact('email','usuarios'))
			->withErrors($validator)
			->withInput(session()->flashInput($request->input()));
		} else {
			if($qtd > 0){
				$input['token']   = Str::random('40');
				$input['user_id'] = $usuarios[0]->id;
				$alt_senha = AlterarSenha::where('token',$input['token'])->get();
				$qtdAlt = sizeof($alt_senha);
				if($qtdAlt > 0){
					$validator = 'ESTE TOKEN JÁ FOI CADASTRADO';
					return view('auth.passwords.email', compact('email','usuarios'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
				} else {
					$alt = AlterarSenha::where('user_id', $input['user_id'])->get();
					$qtdUser = sizeof($alt);
					if($qtdUser > 0){
						DB::statement('DELETE FROM alterar_senha WHERE user_id = '.$input['user_id']);
					}
					$alt_senha = AlterarSenha::create($input);
					$token = DB::table('alterar_senha')->max('token');
					$email2 = 'ilton.albuquerque@hcpgestao.org.br';
					Mail::send('email.emailReset', ['token' => $token], function($m) use ($email,$email2,$token) {
						$m->from('portal@hcpgestao.org.br', 'PORTAL DO PROCESSO SELETIVO');
						$m->subject('Solicitação de Alteração de Senha');
						$m->to($email);
						$m->cc($email2);
					});		
					$validator = 'ABRA SUA CAIXA DE E-MAIL PARA VALIDAR SUA SENHA NOVA';
					return view('auth.passwords.email', compact('email','usuarios'))
						->withErrors($validator)
						->withInput(session()->flashInput($request->input()));
				}
			}else{ 
				$validator = 'Este E-mail não foi cadastrado no Portal do Processo Seletivo.';
				return view('auth.passwords.email', compact('email','usuarios'))
					->withErrors($validator)
					->withInput(session()->flashInput($request->input()));
			}
		}
	}
	
	// Login Usuário //
	public function Login(Request $request)
	{ 
		$input = $request->all(); 		
		$validator = Validator::make($request->all(), [
			'email'    => 'required|email',
            'password' => 'required'
		]);		
		if ($validator->fails()) {
			return view('/')
				->withErrors($validator)
				->withInput(session()->flashInput($request->input())); 
		} else {
			$email = $input['email'];
			$senha = Hash::make($input['password']);		
			$user = User::where('email', $email)->where('password',$senha)->get();
			$qtd = sizeof($user); 			
			if ( $qtd == 0 ) {
				$validator = 'Login Inválido!';
				$unidades = Unidade::all();
				return view('telaLogin', compact('unidades','user'))
					->withErrors($validator)
				  	->withInput(session()->flashInput($request->input())); 						
			} else {
				$unidades = $this->unidade->all();
				Auth::login($user);
				return view('home', compact('unidades','user'))
					->withErrors($validator)
				  	->withInput(session()->flashInput($request->input())); 						
			}
		}
	}
	
	// Resetar Senha Usuário //
	public function resetarSenha(Request $request)
	{ 
		$input = $request->all();		
		$token = "";
		$validator = Validator::make($request->all(), [
			'email'    => 'required|email',
            'password' => 'required|same:password_confirmation',
			'token_'	   => 'required',
			'password_confirmation' => 'required'
    	]);		
		if ($validator->fails()) {
			return view('auth.passwords/reset', compact('token'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));						
		} else {
			if(!empty($input['password'])){ 
				$input['password'] = Hash::make($input['password']);
			}else{
				$input = array_except($input,array('password'));    
			}
			$email = $input['email'];
			$token_ = $input['token_'];
			$user = User::where('email',$email)->get();
			$qtd = sizeof($user);
			if($qtd > 0){
				$alt_senha = AlterarSenha::where('token',$token_)->where('user_id',$user[0]->id)->get();
				$qtdAlt = sizeof($alt_senha);
				if($qtdAlt > 0){
					$user = User::find($user[0]->id);
					$user->update($input);
					$validator = 'Senha alterada com sucesso!';
					$unidades  = $this->unidade->all();
					return view('auth.login', compact('unidades','user'))						
						  ->withErrors($validator)
						  ->withInput(session()->flashInput($request->input()));								
				} else {
					$validator = 'Token Inválido!';
					return view('auth.passwords.reset',compact('token'))						
						  ->withErrors($validator)
						  ->withInput(session()->flashInput($request->input()));								
				}
			} else {
				$validator = 'Usuário não existe!';
				$unidades  = Unidade::all();
				$token = '';
				return view('auth.passwords.reset', compact('unidades','user','token'))
					  ->withErrors($validator)
                      ->withInput(session()->flashInput($request->input()));								
			}
		}
	}
	
	// Salvar Novo Usuário //
    public function store(Request $request)
    {
		$input = $request->all();
		$validator = Validator::make($request->all(), [
			'name'     		   => 'required',
            'email'    		   => 'required|email|unique:users,email',
            'password' 		   => 'required|same:password_confirmation',
			'password_confirmation' => 'required'
    	]);			 
		if ($validator->fails()) {
			return view('auth.register')
				->withErrors($validator)
				->withInput(session()->flashInput($request->input()));
		} else {
			$senha = $input['password'];
			$input['password'] = Hash::make($input['password']);
			$user  = User::create($input);
			$validator = 'Usuário cadastrado com sucesso!';
			$unidades  = $this->unidade->all();
			$processos = ProcessoSeletivo::all();
			$email 	   = $input['email']; 
			Mail::send('email.emailUsuarioLS', ['login' => $email, 'senha' => $senha], function($m) use ($email) {
				$m->from('portal@hcpgestao.org.br', 'PORTAL Processo Seletivo');
				$m->subject('Cadastro Processo Seletivo');
				$m->to($email);
			});
			Mail::send('email.emailUsuario', [], function($m) use ($email) {
				$m->from('portal@hcpgestao.org.br', 'PORTAL Processo Seletivo');
				$m->subject('Cadastro de Novo Usuário - PORTAL Processo Seletivo');
				$m->to($email);
			});
			return view('home', compact('processos'))
				->withErrors($validator)
				->withInput(session()->flashInput($request->input())); 						
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