<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscRespostas extends Model
{
    use HasFactory;
    protected $fillable = [
        'funcionario_id',
        'alternativa_id',
        'valor_escolhido',
       
    ];
    protected $table = 'disc_respostas';
    public function alternativa()
    {
        return $this->belongsTo(DiscAlternativas::class, 'alternativa_id');
    }
}
