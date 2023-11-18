<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setores extends Model
{ 
    use HasFactory;

    protected $table = 'setores';

    public function subsetores()

    {

        return $this->hasMany(SubSetores::class, 'id_setor', 'id')
        ->with('dadosOrganizacionais')
        ->with('cargos')
        ->with('caracteristicas')
        ->with('preDiagnostico')
        ->with('moore')
        ->with('rula')
        ->with('owas')
        ->with('suerodgers')
        ->with('fotos')
        ->with('niosh')
        ->with('fotosatividade')
        ->with('populacaosubsetor')
        ->with('conclusoes')
        ->with('dadossaude')
        ->with('analiseAtividade')
        ->with('tarefa')
        ->with('funcao')
        ->with('descricaoFotos')
        ->with('recomendacao')
        ->with('ChecklistCadeira')
        ->with('ChecklistApoioPes')
        ->with('ChecklistComputador')
        ->with('ChecklistDocumentos')
        ->with('ChecklistIluminacao')
        ->with('ChecklistLeiaute')
        ->with('ChecklistMesa')
        ->with('ChecklistMonitor')
        ->with('ChecklistNotebook')
        ->with('ChecklistSistema')
        ->with('ChecklistSuporteTeclado')
        ->with('ChecklistTeclado');

    }
    
    public function area(){
        
        return $this->hasOne(Area::class, 'id', 'id_area');
  
      }

      public function empresa(){
        
        return $this->hasOne(Empresas::class, 'id', 'id_empresa');
  
      }
}
