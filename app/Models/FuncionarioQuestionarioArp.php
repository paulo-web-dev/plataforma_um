<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionarioQuestionarioArp extends Model
{
    use HasFactory;

    protected $table = 'funcionario_questionario_arp';

    protected $fillable = [
        'nome',
        'email'
    ];
    public function empresa()

    {

        return $this->hasOne(Empresas::class, 'id_empresa', 'id');

    }

    public function respostas() {
        return $this->hasMany(DiscRespostas::class, 'funcionario_id');
    }
}

