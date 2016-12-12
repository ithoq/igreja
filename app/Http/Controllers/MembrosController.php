<?php

namespace App\Http\Controllers;
use App\Helpers\Helpers;
use App\Models\Admin\MembrosModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/**
 * show_membros
 * create_membros
 * set_token_cadastro
 * show_listagem_membros
 * datatable_membros
 * delete_membros
 * show_update_membros
 * update_membros
 */
class MembrosController extends Controller{
	
	public function __construct(){
        //$this->middleware('auth', ['except' => ['create_membros', ''] ]);
    }
	
	/**
	 * Mostra a view de cadastro de membros
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show_membros(){
		return view('admin.membros-cadastrar');
	}
	
	/**
	 * Cadastra os membros no banco de dados
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public  function create_membros( Request  $request ){
		/*
		 ****************************************
		 *  Validação dos campos de e-mail      *
		 ****************************************
		 */
		$rules = [
			'mem_nome'          => $request->input('mem_nome'),
			'mem_cpf'           => $request->input('mem_cpf'),
			'mem_tel_celular'   => $request->input('mem_tel_celular'),
			'mem_cargo'         => $request->input('mem_cargo'),
			'attributes'        => [
							        'mem_nome'    => 'Nome',
							        'mem_cpf' => 'CPF',
							        'mem_tel_celular' => 'Celular',
							        'mem_cargo' => 'Cargo/ Ministerio'
							    ],
		];
		
		
		
		// Valida as regras
		$validator = Validator::make($rules, [
			"mem_nome"               => "required",
			"mem_cpf"                => "required",
			"mem_tel_celular"        => "required",
			"mem_cargo"              => "required",
			
		]);
		$validator->setAttributeNames($rules['attributes']);
		
		
		/*
		 ****************************************
		 *  Verifica se existe uma imagem       *
		 *  add na arraypara inserção no banco  *
		 *  valida tamanho e extesão da img     *
		 ****************************************
		 */
		if ($request->hasFile('foto_upload') ) {
			
			// Valida imagem
			$validator_file = Validator::make(['imagem' => $request->file('foto_upload')], [
				'imagem' => 'mimes:jpeg,bmp,png,gif|max:1024'
			]);
			
			if( $validator_file->fails() ) {
				return back()->withInput($request->all())->withErrors($validator_file);
		    }
			
			$newnome= uniqid().'foto-membros.'.$request->file('foto_upload')->extension();
				    
			$request->merge( ['mem_foto' => $newnome] ); // adiciona o campo mem_foto na array para add no banco
			
			
		}
		
		if( $validator->fails() ) {
			return back()->withInput($request->all())->withErrors($validator);
	    }
	    
		/*
		 *************************************************************************
		 * Formata data do formulario para padrão do baco de dados AAAA/MM/DD    *
		 *************************************************************************
		 */
		$request->merge( ['mem_nascimento' => Helpers::dateToDB($request->mem_nascimento)] );
		$request->merge( ['mem_data_batismos' => Helpers::dateToDB($request->mem_data_batismos)] );
	    
		
		
		if ($request->hasFile('foto_upload') ) {
			$request->file('foto_upload')->storeAs('images',$newnome);//sobe a img para pasta
		}
		
		MembrosModel::create($request->all()); // salva no banco
	   
		/*
		 * Deleta o token da tabela tokens do cadastro externo
		 */
		if($request->has('token_cadastro_externo')){
			
			$reult = DB::table('tokens')->where('token_cadastro_externo' ,  $request->token_cadastro_externo)->delete();
			// criar uma view para cadastro efetuado com sucesso
			return redirect('/')->with('success', 'Cadastro realizado com sucesso'); // redireciona com msm de sucesso
			
		}
		return back()->with('success', 'Cadastro realizado com sucesso'); // redireciona com msm de sucesso
	
	}
	
	/**
	 * @param Request $request array com token e id do usuario
	 */
	public function set_token_cadastro( Request  $request){
		DB::table ('tokens')->insert($request->all());
	}
	
	/**
	 * @return listagem de membros
	 */
	public function show_listagem_membros(){
		return view('admin.membros-listagem');
	}
	
	/**
	 * @return mixed tabela dos membros por tadatables
	 * busca no banco os membros e mosta a estrutura para datatables
	 */
	public function datatable_membros(){
		$data = User::find( Auth::user()->id)->membros()->select('id', 'mem_nome','mem_sexo','mem_cargo','mem_status')->get();
		return Datatables::of( $data)
			->editColumn('mem_status', '<span>{{$mem_status}}</span>')
			->addColumn('acao', function ($data) {
				return '
				
					<a href="'.route('show_update_membros', ['id' => $data->id]).'" class="btn btn-icon-only blue"><i class="fa fa-edit"></i></a>
					<a href="'.route('delete_membros', ['id' => $data->id]).'" class="btn btn-icon-only red"> <i class="fa fa-trash-o"></i> </a>
				';
            })
			->make(true);
	}
	
	/**
	 * @param $id  id do membro a ser deletado
	 * @return true or false
	 */
	public function delete_membros($id){
		$result = MembrosModel::where('id', $id)->delete();
		
		if($result){
			return back()->with('success', 'Cadastro deletado com sucesso'); // redireciona com msm de sucesso
		}else{
			return back()->withErrors('Erro ao deletar o suario, atualize a página e tente novamente'); // redireciona com msm de sucesso	
		}
	}
	
	/**
	 * @param $id id od membro a ser atualizado
	 * @return carega a view do formulario para atualizar membro
	 */
	public function show_update_membros($id){
		$result = MembrosModel::where('id', $id)->first();
		return view('admin.membros-update')->with('data' ,$result);
	}
	
	/**
	 * @param Request $request
	 * @return true ou false
	 * faz a atualização do membro no banco
	 */
	public function update_membros(Request  $request){
		/*
		 ****************************************
		 *  Verifica se existe uma imagem       *
		 *  add na array para inserção no banco *
		 *  valida tamanho e extesão da img     *
		 ****************************************
		 */
		if ($request->hasFile('foto_upload') ) {
			// Valida imagem
			$validator_file = Validator::make(['imagem' => $request->file('foto_upload')], [
				'imagem' => 'mimes:jpeg,bmp,png,gif|max:1024'
			]);
			
			if( $validator_file->fails() ) {
				return back()->withInput($request->all())->withErrors($validator_file);
		    }
			
			$newnome= uniqid().'foto-membros.'.$request->file('foto_upload')->extension();
				    
			$request->merge( ['mem_foto' => $newnome] ); // adiciona o campo mem_foto na array para add no banco
		}
		
		$request->merge( ['mem_nascimento' => Helpers::dateToDB($request->mem_nascimento)] );
		$request->merge( ['mem_data_batismos' => Helpers::dateToDB($request->mem_data_batismos)] );
		$result = MembrosModel::where('id', $request->id)->update($request->except('_token', 'foto_upload'));
	
		if($result){
			if ($request->hasFile('foto_upload') ) {
				$request->file('foto_upload')->storeAs('images',$newnome);//sobe a img para pasta
			}
			return redirect()->route('show_listagem_membros')->with('success', 'Cadastro Atualizadocom sucesso'); // redireciona com msg de sucesso
		}else{
			return redirect()->route('show_listagem_membros')->withErrors('Erro ao atualizar o cadastro de {$request->mem_nome}, por favor tente novamente'); // redireciona com msg de sucesso
		}
		
	}
	
}



















