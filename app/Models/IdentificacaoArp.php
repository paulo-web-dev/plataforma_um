<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacaoArp extends Model
{
    use HasFactory;

    protected $table = 'identificacao_arp';


    public function empresa()

    {

        return $this->hasOne(Empresas::class, 'id_empresa', 'id');

    }
}

