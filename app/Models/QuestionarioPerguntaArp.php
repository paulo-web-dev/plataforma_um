<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionarioPerguntaArp extends Model
{
    use HasFactory;

    protected $table = 'questionario_pergunta_arp';


    public function respostas()

    {

        return $this->hasMany(QuestionarioRespostaArp::class, 'id_pergunta', 'id');

        
    }

    
    public function categoria()

    {

        return $this->hasOne(QuestionarioPerguntaCategoriaArp::class, 'id_pergunta', 'id')->with('categoria');

    }
}

