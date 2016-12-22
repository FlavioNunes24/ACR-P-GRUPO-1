<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Compra;

class PerfilController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
	{
		//$user = $request->user();
		$user = \Auth::user();

		 if($user)
         $compras = $user->compra()->get();

      	//dd($compras);
		return view('perfil', compact('user', 'compras'));
	}


	public function editar(Request $request,$id)
	{
		$user = \Auth::user()->find($id);
		return view('editar',compact('user'));
	}

	public function confirmar(Request $request, $id)
	{
			
			/*$this->validate($request, [

            'name' => 'required|max:255',
            'username' => 'required|max:20|unique:users',
            'email' => 'required|email|max:255',
            //'data_nasc' => 'required',
            'pais' => 'required|max:20',
            ]);*/
				
            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->pais = $request->pais;
            $user->data_nasc = $request->data_nasc;
            $user->saldo = $request->saldo;
            $user->password = $request->password;
    
            $user->save();

            return redirect ('/perfil')->with('message','Dados pessoais alterados com sucesso');;

	}
}
