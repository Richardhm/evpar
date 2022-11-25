<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('experiencia_id');
            $table->unsignedBigInteger('especialidade_id');
            $table->string('nome');
            $table->string("nome_pai");
            $table->string("nome_mae");
            $table->date("data_nascimento")->nullable();  
            $table->string('cpf');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('cep');
            $table->string('telefone');
            $table->string('complemento');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->foreign('experiencia_id')->references('id')->on('experiencias')->onDelete("cascade");
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
