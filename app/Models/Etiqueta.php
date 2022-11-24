<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etiqueta extends Model
{
    use HasFactory;
    //softDeletes
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'color'];

    public function getRouteKeyName(){
        return "slug";
    }

    //Relacion muchos a muchos 
    public function cursos(){
        return $this->belongsToMany(Curso::class);
    }
}
