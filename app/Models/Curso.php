<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    //asignación masiva, incamos campos que no quueremos que se llenen con asignacion masiva
    protected $guarded = ['id','created_at','updated_at'];

    //Relacion 1 a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Relación muchos a muchos
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }

    //Relacion 1 a 1 polimofica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
