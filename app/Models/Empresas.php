<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Empresas extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    
    public function setores()

    {

        return $this->hasMany(Setores::class, 'id_empresa', 'id')->with('subsetores');

    }

    public function populacao()

    {

        return $this->hasMany(PopulacaoEmpresa::class, 'id_empresa', 'id');

    }

     
    public function introducao()

    {

        return $this->hasOne(Introducao::class, 'id_empresa', 'id');

    }

    
     
    public function metodologia()

    {

        return $this->hasOne(Metodologia::class, 'id_empresa', 'id');

    }

    public function equipe()

    {

        return $this->hasOne(Equipe::class, 'id_empresa', 'id');

    }

    public function objetivos()

    {

        return $this->hasMany(Objetivos::class, 'id_empresa', 'id');

    }

    public function disposicao()

    {

        return $this->hasOne(Disposicoes::class, 'id_empresa', 'id');

    }

    public function mapeamento()

    {

        return $this->hasMany(Mapeamento::class, 'id_empresa', 'id');

    }

    public function planodeacao()

    {

        return $this->hasMany(PlanoDeAcao::class, 'id_empresa', 'id');

    }

    public function responsaveis()

    {

        return $this->hasMany(Responsaveis::class, 'id_empresa', 'id');

    }
}
