<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    protected $table = "funcionarios";
    protected $fillable = ["user_id","experiencia_id","especialidade_id","nome","nome_pai","nome_mae","data_nascimento","cpf","cidade","bairro","logradouro","cep","telefone","complemento"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }





}
