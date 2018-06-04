<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;
        /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        if($user->hasRole('admin')){
            return true;
        }
//        $comment = Comment::findOrFail($comment)->first();
        if ($user->can('manage own comments')) {
            return $user->id == $comment->user_id;
        }
    }


}
