<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MembrosModel extends Model{
	protected $table = "membros";
					
	protected $fillable = ['mem_status','mem_nome','mem_sexo','mem_nascimento','mem_estado_civil','mem_nome_conjuge','mem_cep_endereco','mem_endereco','mem_numero_endereco','mem_cidade_endereco','mem_estado_endereco','mem_cpf','mem_rg','mem_tel_celular','mem_tel_residencia','mem_email','mem_apelido','mem_nome_pai','mem_nome_mae','mem_nome_empresa','mem_tel_empresa','mem_profissao','mem_foto','mem_cargo','mem_data_batismos','user_id'];

	public  function user(){
		return $this->belongsTo(User::class);
	}

}
