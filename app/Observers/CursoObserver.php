<?php

namespace App\Observers;

use App\Models\Curso;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class CursoObserver
{
    /**
     * Handle the Curso "created" event.
     *
     * @param  \App\Models\Curso  $curso
     * @return void
     */
    public function creating(Curso $curso)
    {
        if (! App::runningInConsole()) {
            $curso->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Curso "deleted" event.
     *
     * @param  \App\Models\Curso  $curso
     * @return void
     */
    public function deleting(Curso $curso)
    {
        if($curso->image){
            Storage::delete($curso->image->url);
        }
    }
}
