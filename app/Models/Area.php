<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';

    public function setores()

    {

        return $this->hasMany(Setores::class, 'id_area', 'id')
        ->with('subsetores')
        ->orderBy('ordenacao');

    }
}
