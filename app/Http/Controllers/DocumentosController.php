<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentosController extends Controller{
    
	public function show_arquivos(){
		return view('admin.arquivos');
	}
	
}
