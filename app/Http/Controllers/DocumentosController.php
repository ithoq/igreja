<?php namespace App\Http\Controllers;
use App\Helpers\Helpers;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class DocumentosController extends Controller{
	
	public function show_arquivos(){
		return view('admin.arquivos');
	}
	
	public function send_arquivos(Request $request){
		$i = 0;
		foreach ($request->file('input4')  as $arq ){
			$nome = 'nome_'.$i;
			$arq->storeAs('public/documentos/user_id'. Auth::user()->id , $request->input($nome).'.'.$arq->getClientOriginalExtension());
			DB::table('documentos')->insert([
				'nome' => $request->input($nome),
				'arquivo' => $request->input($nome).'.'.$arq->getClientOriginalExtension(),
				'tipo' => 'arquivo',
				'user_id' => Auth::user()->id,
				'created_at' => date('Y/m/d')
			]);
			$i++;
		}
		return json_encode('sucess');
		
	}
	
	public function datatable_arquivos(){
		$data = DB::table('documentos')->select('id', 'nome','descricao','arquivo','created_at')->where('user_id', Auth::user()->id)->get();
		
		//dump($data);
		//exit();
		
		return Datatables::of( $data)
			->editColumn('descricao',  '<span>{{   str_limit($descricao , 75)   }}</span>')
			->editColumn('created_at',  '<span>{{     App\Helpers\Helpers::dateToBR($created_at)  }}</span>')
			->addColumn('acao', function ($data) {
				return '
						<span   onclick="global.update_arquivo('.$data->id.' , \''.$data->descricao.'\' , \''.$data->nome.'\' )" data-toggle="modal" data-target=".modal-update-arquivo"  data-descricao="" data-nome='.$data->nome.'  class="btn btn-icon-only blue"><i class="fa fa-edit"></i></span>
						<a href=" '.asset('storage\documentos\user_id').Auth::user()->id.'/'. $data->arquivo.'  " download  target="_blank" class="btn btn-icon-only blue"> <i class="fa fa-download"></i> </a>
						<a href="'.route('delete_arquivo', ['id' => $data->id]).'" class="btn btn-icon-only red"> <i class="fa fa-trash-o"></i> </a>
					';
			})
			->make(true);
	}
	
	public function delete_arquivo($id){
		$result = DB::table('documentos')->where('id', $id)->delete();
		if($result){
			return back()->with('success', 'Arquivo deletado com sucesso'); // redireciona com msm de sucesso
		}else{
			return back()->withErrors('Erro ao deletar o suario, atualize a página e tente novamente'); // redireciona com msm de sucesso	
		}
	}
	
}
