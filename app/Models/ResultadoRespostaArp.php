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

        return $this->hasOne(QuestionarioPerguntaArp::class, 'id_pergunta', 'id');

    }
    
    public function empresa()

    {

        return $this->hasOne(Empresas::class, 'id_empresa', 'id');

    }
    
    public function resposta()

    {

        return $this->hasOne(QuestionarioRespostaArp::class, 'id_resposta', 'id');

    }
    
    public function funcionario()

    {

        return $this->hasOne(FuncionarioQuestionarioArp::class, 'id_func', 'id');

    }
}

