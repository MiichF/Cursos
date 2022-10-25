<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //Relación 1 a Muchos
    public function cursos(){
        return $this->hasMany(Curso::class);
    }
}
