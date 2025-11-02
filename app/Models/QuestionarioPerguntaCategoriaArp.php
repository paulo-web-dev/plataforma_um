<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionarioPerguntaCategoriaArp extends Model
{
    use HasFactory;

    protected $table = 'categorias_perguntas_questionario_ar';


    public function pergunta()

    {

        return $this->hasOne(QuestionarioPerguntaArp::class, 'id', 'id_pergunta');

    }


    

    public function categoria()

    {

        return $this->hasOne(QuestionatioCategoriaArp::class, 'id', 'id_categoria');

    }
}

