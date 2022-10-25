<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //vamos a establecer que deseamos usar relaciones polimorficas
    //Relación polimorfica
    public function imageable(){
        return $this->morphTo();
    }
}
