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

        return $this->hasMany(Caracteristicas::class, 'id_subsetor', 'id');

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

        return $this->hasMany(Recomendacao::class, 'id_subsetor', 'id');

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
        
        return $this->hasOne(DadosSaude::class, 'id_subsetor', 'id');
  
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
}
