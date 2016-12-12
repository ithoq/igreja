<?php
Auth::routes();
//Route::get('/home', 'HomeController@index');
/*
 ***************************************
 * 				BASE DO SITE           *
 ***************************************
 */
Route::get('/', function () {
    return view('[DEL]welcome');
});

/*
 ***************************************
 * ROTAS FORMULARIO EXTERNO DE MEMBROS *
 ***************************************
 */
Route::post('/cadastro/token', 'MembrosController@set_token_cadastro'); // recebe token e id via ajax e cadastra no banco
Route::post('membros/externo', 'MembrosController@create_membros')->name('create_membros-externo'); // recebedados do formulario externo
// LINK CADASTRO EXTERNO
Route::get('/cadastro/externo/{token}', function ($token) {
	$result = DB::table('tokens')->where('token_cadastro_externo' , $token)->first();
	if($result){
		return view('admin.membros-cadastrar-externo')
					->with([
						'user_id' => $result->id_user,
						'token_cadastro_externo' => $token
						
					]);
	}
	App::abort(404);
});
	
/**
 *  show_    = prefixo para mostrar a view
 *  create_  = prefixo para criar
 *  update_  = prefixo para atualizar
 *  delete_  = prefixo para deletar 
 * 
 * 
 * ******************************************************************************
 *  Route::get('user/profile', 'UserController@showProfile')->name('profile');  *
 *  Grupo de rotas painel administrador                                         *
 *  Rotas com prefixo admin/                                                    *
 *  Rotas com o middleware auth (Laravel), fazendo a verificação  do painel     *
 * ******************************************************************************
 */

	Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
	    Route::get('/', function (){return view('admin.home'); });
		Route::get('/dashboard', function (){return view('admin.home'); })->name('dashboard');
	
		// MEMBROS
		Route::get('membros', 'MembrosController@show_membros')->name('show_membros');
		Route::post('membros', 'MembrosController@create_membros')->name('create_membros');
		Route::get('membros/listagem', 'MembrosController@show_listagem_membros')->name('show_listagem_membros');
		Route::get('membros/datatable', 'MembrosController@datatable_membros')->name('datatable_membros');
		Route::get('membros/delete/{id}', 'MembrosController@delete_membros')->name('delete_membros');
		Route::get('membros/update/{id}', 'MembrosController@show_update_membros')->name('show_update_membros');
		Route::post('membros/update/', 'MembrosController@update_membros')->name('update_membros');
	
		// DOCUMENTOS
		Route::get('arquivos', 'DocumentosController@show_arquivos')->name('show_arquivos');
		Route::post('arquivos/send', 'DocumentosController@send_arquivos')->name('send_arquivos');
		Route::get('arquivos/datatables', 'DocumentosController@datatable_arquivos')->name('datatable_arquivos');
		Route::get('arquivos/delete/{id}', 'DocumentosController@delete_arquivo')->name('delete_arquivo');
	
	});// END_ADMIN
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
