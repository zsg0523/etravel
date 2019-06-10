<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;

class UserSchoolsController extends Controller
{
    /** [school 用户添加学校] */
    public function store(User $user, School $school)
    {
        if ( ! $user->hasSchool($school->id) ) {
            $user->addSchool($school->id);
        }

        return $this->response->array(['message' => $user->name . '添加學校成功！'])->setStatusCode(201);

    }

    /** [destroy 取消用户添加的学校] */
    public function destroy(User $user, School $school)
    {
    	if ( $user->hasSchool($school->id) ) {
            $user->removeSchool($school->id);
        }

        return $this->response->noContent();
    }
}
