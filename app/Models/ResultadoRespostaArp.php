<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoRespostaArp extends Model
{
    use HasFactory;

    protected $table = 'resultado_pesquisa_arp';


    public function pergunta()

    {

        return $this->hasOne(QuestionarioPerguntaArp::class, 'id', 'id_pergunta')->with('categoria');

    }
    
    public function empresa()

    {

        return $this->hasOne(Empresas::class, 'id', 'id_empresa');

    }
    
    public function resposta()

    {

        return $this->hasOne(QuestionarioRespostaArp::class, 'id', 'id_resposta')->with('resposta');

    }
    
    public function funcionario()

    {

        return $this->hasOne(FuncionarioQuestionarioArp::class, 'id', 'id_func');

    }
}

