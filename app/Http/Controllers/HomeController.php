<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProcessoSeletivo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
		$processos = ProcessoSeletivo::all();
		$text = false;
        return view('home', compact('processos','text'));
    }
	
	public function buttons()
	{
		return view('buttons');
	}
}
