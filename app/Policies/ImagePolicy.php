<?php

namespace App\Policies;

use App\Comment;
use App\User;
use App\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Image $image)
    {
        if($user->hasRole('admin')){
            return true;
        }
        if ($user->can('manage own images')) {
            return $user->id == $image->user_id;
        }

        return false;
    }


}
