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

    public function demanda()

    {

        return $this->hasOne(Demanda::class, 'id_empresa', 'id');

    }

    public function analise()

    {

        return $this->hasOne(AnaliseGlobal::class, 'id_empresa', 'id');

    }

    public function area()

    {

        return $this->hasMany(Area::class, 'id_empresa', 'id');

    }

    


    public function ChecklistCadeira()

    {

        return $this->hasOne(ChecklistCadeira::class, 'id_empresa', 'id');

    }


    public function ChecklistApoioPes()

    {

        return $this->hasOne(ChecklistApoioPes::class, 'id_empresa', 'id');

    }


    public function ChecklistComputador()

    {

        return $this->hasOne(ChecklistComputador::class, 'id_empresa', 'id');

    }


    public function ChecklistDocumentos()

    {

        return $this->hasOne(ChecklistDocumentos::class, 'id_empresa', 'id');

    }

    public function ChecklistIluminacao()

    {

        return $this->hasOne(ChecklistIluminacao::class, 'id_empresa', 'id');

    }

    public function ChecklistLeiaute()

    {

        return $this->hasOne(ChecklistLeiaute::class, 'id_empresa', 'id');

    }

    public function ChecklistMesa()

    {

        return $this->hasOne(ChecklistMesa::class, 'id_empresa', 'id');

    }
    public function ChecklistMonitor()

    {

        return $this->hasOne(ChecklistMonitor::class, 'id_empresa', 'id');

    }

    public function ChecklistNotebook()

    {

        return $this->hasOne(ChecklistNotebook::class, 'id_empresa', 'id');

    }

    public function ChecklistSistema()

    {

        return $this->hasOne(ChecklistSistema::class, 'id_empresa', 'id');

    }

    public function ChecklistSuporteTeclado()

    {

        return $this->hasOne(ChecklistSuporteTeclado::class, 'id_empresa', 'id');

    }

    public function ChecklistTeclado()

    {

        return $this->hasOne(ChecklistTeclado::class, 'id_empresa', 'id');

    }
}
