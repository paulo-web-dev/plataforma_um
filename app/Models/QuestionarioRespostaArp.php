<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionarioRespostaArp extends Model
{
    use HasFactory;

    protected $table = 'questionario_resposta_arp';


    public function pergunta()

    {

        return $this->hasOne(QuestionarioPerguntaArp::class, 'id_pergunta', 'id');

    }
}

