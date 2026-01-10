<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscPergunta extends Model
{
    use HasFactory;

    protected $table = 'disc_perguntas';

    public function alternativas() {
        return $this->hasMany(DiscAlternativas::class, 'pergunta_id');
    }
}
