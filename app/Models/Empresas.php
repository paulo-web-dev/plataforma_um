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
        return $this->hasMany(Setores::class, 'id_empresa', 'id')
                    ->with('subsetores')
                    ->orderBy('ordenacao');
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
        return $this->hasMany(Mapeamento::class, 'id_empresa', 'id')->orderBy('area')->orderBy('setor')->orderBy('posto_trabalho')->orderBy('funcao')->orderBy('atividade');
    }
      
    public function planodeacao()
    {
        return $this->hasMany(PlanoDeAcao::class, 'id_empresa', 'id')->orderBy('area')->orderBy('setor')->orderBy('posto_trabalho')->orderBy('funcao');
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

    
    public function identidade()

    {

        return $this->hasOne(IdentidadeVisual::class, 'id_user', 'id');

    }

    public function cabecalho()

    {

        return $this->hasOne(Cabecalho::class, 'id_empresa', 'id');

    }


    public function rodape()

    {

        return $this->hasOne(Rodape::class, 'id_empresa', 'id');

    }

    public function area()

    {

        return $this->hasMany(Area::class, 'id_empresa', 'id');

    }

    
}
