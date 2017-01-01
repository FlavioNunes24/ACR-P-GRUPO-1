<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Compra;
use Crypt;

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
		if($request->user()->tipo_utilizador == 2 || $request->user()->id == $id)
		{
		$user = \Auth::user()->find($id);
		return view('editar',compact('user'));
		}
		else
		{
			return redirect('/');
		}
	}

	public function confirmar(Request $request, $id)
	{
			

            //validação de dados
            $this->validate($request, [

            
            'name' => 'required|max:255',
            'username' => 'required|max:20|unique:users,username,'.$request->id,
            'data_nasc' => 'required|before:now',
            'pais' => 'required|max:20',
            'email' => 'required|unique:users,email,'.$request->id,
            ]);
            //inserção dos dados    
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

    public function saldo($id){

        $user = \App\User::find($id);

        return view('saldo', compact('user'));

    }

    public function adicionarSaldo(Request $request)
    {


         $this->validate($request, [

            
            'saldo' => 'required|numeric',
            ]);



    $user = \App\User::findOrFail($request->id);

    
    if($user->email == $request->email)
    {
        $a = $user->saldo;
        $user->saldo = $a + $request->saldo;
        $user->save();
        return redirect ('/perfil')->with('message','Saldo adicionado com sucesso');
    }   
    if($user->email != $request->email)
    {
        return redirect ('/perfil')->with('error','O email não é válido');
    }
    }
}
