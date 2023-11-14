<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSetores extends Model
{
    use HasFactory;

    protected $table = 'sub_setores';

    public function dadosOrganizacionais()

    {

        return $this->hasMany(DadosOrganizacionais::class, 'id_subsetor', 'id');

    }

    public function cargos()

    {

        return $this->hasMany(Cargos::class, 'id_subsetor', 'id');

    }

    public function caracteristicas()

    {

        return $this->hasMany(Caracteristicas::class, 'id_subsetor', 'id')->orderBy('ordenacao');

    }

    public function preDiagnostico()

    {

        return $this->hasMany(PreDiagnostico::class, 'id_subsetor', 'id');

    }

    public function moore()

    {

        return $this->hasMany(MooreGarg::class, 'id_subsetor', 'id');

    }

    public function rula()

    {

        return $this->hasMany(Rula::class, 'id_subsetor', 'id');

    }

    public function owas()

    {

        return $this->hasMany(Owas::class, 'id_subsetor', 'id');

    }

    public function suerodgers()

    {

        return $this->hasMany(SueRodgers::class, 'id_subsetor', 'id');

    }

     
    public function niosh()

    {

        return $this->hasMany(Niosh::class, 'id_subsetor', 'id');

    }

    public function fotos()

    {

        return $this->hasMany(Foto::class, 'id_subsetor', 'id');

    }

    
    public function recomendacao()

    {

        return $this->hasMany(Recomendacao::class, 'id_subsetor', 'id')->orderBy('ordenacao');

    }

    public function fotosatividade()

    {

        return $this->hasMany(FotosAtividades::class, 'id_subsetor', 'id');

    }

    public function populacaosubsetor()

    {

        return $this->hasMany(PopulacaoSubsetor::class, 'id_subsetor', 'id');

    }

    public function conclusoes(){
        
      return $this->hasMany(Conclusoes::class, 'id_subsetor', 'id');

    }

    public function dadossaude(){
        
        return $this->hasOne(DadosSaude::class, 'id_subsetor', 'id')->with('segmentos');
  
      }

      public function analiseAtividade(){
        
        return $this->hasOne(AnaliseAtividade::class, 'id_subsetor', 'id');
  
      }


      public function tarefa(){
        
        return $this->hasOne(Tarefa::class, 'id_subsetor', 'id');
  
      }

      public function funcao(){
        
        return $this->hasOne(Funcao::class, 'id_subsetor', 'id');
  
      }

      
      public function descricaoFotos(){
        
        return $this->hasOne(DescricaoFoto::class, 'id_subsetor', 'id');
  
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
