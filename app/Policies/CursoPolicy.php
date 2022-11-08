<?php

namespace App\Policies;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function author(User $user, Curso $curso)
    {
        if($user->id == $curso->user_id)
        {
            return true;
        }else{
            return false;
        }
    }

    public function published(?User $user, Curso $curso)
    {
        if($curso->status == 2)
        {
            return true;
        }else{
            return false;
        }
    }
}
