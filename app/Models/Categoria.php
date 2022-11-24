<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    //softDeletes
    use SoftDeletes;
    //habilitar asignación masiva
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }
    //Relación 1 a Muchos
    public function cursos(){
        return $this->hasMany(Curso::class);
    }
}
