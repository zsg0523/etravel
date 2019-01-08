<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Write;

use Illuminate\Auth\Access\HandlesAuthorization;

class WritePolicy
{
    use HandlesAuthorization;
    

    public function update(User $user, Write $write)
    {
        return $user->isAuthorOf($write);
    }


    public function delete(User $user, Write $write)
    {
        return $user->isAuthorOf($write);
    }



}
