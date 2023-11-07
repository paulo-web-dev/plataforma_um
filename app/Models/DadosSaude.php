<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosSaude extends Model
{
    use HasFactory;

    protected $table = "dados_saude";

         
    public function segmentos()

    {

        return $this->hasOne(SegmentoCorporal::class, 'id_dados_saude', 'id');

    }
}
