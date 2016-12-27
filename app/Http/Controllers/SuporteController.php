<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SuporteController extends Controller
{
    public function index()
	{
		return view('suporte');
	}

	public function enviarMensagem(Request $request)
	{
		$this->validate($request,[
			'email_contacto' => 'required|email',
			'assunto'=>'min:3',
			'nome'=> 'min:3',
			'mensagem'=>'min:10']);
		
		$data =[
			'email_contacto' => $request->email_contacto,
			'nome' =>$request->nome,
			'subject' => $request->assunto,
			'mensagem' => $request->mensagem
		
		];
		
		Mail::send('emails.contactos', $data, function($message) use($data) {

			$message->to('musicstoreuma@gmail.com');
			$message->from($data['email_contacto'],$data['nome']);
			$message->subject($data['subject']);


		});

		//return view ('suporte');
		return redirect('/suporte');
	}

}
