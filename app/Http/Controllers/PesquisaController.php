<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    public function index()
	{
		return view('pesquisa');
	}
}
