<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMembros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
	    
	    Schema::create('membros', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('mem_status', 255)->nullable();
            $table->string('mem_nome', 255)->nullable();
            $table->string('mem_sexo', 2)->nullable();
            $table->date('mem_nascimento')->nullable();
            $table->string('mem_estado_civil', 255)->nullable();
            $table->string('mem_nome_conjuge', 255)->nullable();
            $table->string('mem_cep_endereco', 255)->nullable();
            $table->string('mem_endereco', 255)->nullable();
            $table->string('mem_numero_endereco', 255)->nullable();
            $table->string('mem_cidade_endereco', 255)->nullable();
            $table->string('mem_estado_endereco', 255)->nullable();
            $table->string('mem_cpf', 255)->nullable();
            $table->string('mem_rg', 255)->nullable();
            $table->string('mem_tel_celular', 255)->nullable();
            $table->string('mem_tel_residencia', 255)->nullable();
            $table->string('mem_email', 255)->nullable();
            $table->string('mem_apelido', 255)->nullable();
            $table->string('mem_nome_pai', 255)->nullable();
            $table->string('mem_nome_mae', 255)->nullable();
            $table->string('mem_nome_empresa', 255)->nullable();
            $table->string('mem_tel_empresa', 255)->nullable();
            $table->string('mem_profissao', 255)->nullable();
            $table->string('mem_cargo', 255)->nullable();
            $table->date('mem_data_batismos', 255)->nullable();
            $table->string('mem_foto', 255)->nullable()->default('');
            $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
	    
	    Schema::drop('membros');
    }
}

