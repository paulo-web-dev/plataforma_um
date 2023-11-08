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
        ->with('recomendacao');
        

    }
    
    public function area(){
        
        return $this->hasOne(Area::class, 'id_area', 'id');
  
      }
}
