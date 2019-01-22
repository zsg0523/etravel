<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        // 如果用户有管理内容权限，直接通过
        if ($user->can('manage_contents')) {
            return true;
        }
    }


}
