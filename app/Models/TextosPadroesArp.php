<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextosPadroesArp extends Model
{
    use HasFactory;

    protected $table = 'textos_padroes_arp';


    public function instituicao()

    {

        return $this->hasOne(Instituicao::class, 'id_instituicao', 'id');

    }
}

