<?php

namespace App\Providers;

use App\Comment;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\ImagePolicy;
use App\Image;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Image::class => ImagePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage', function ($user, $comment) {
            if($user->hasRole('admin')){
                return true;
            }

            $comment = Comment::findOrFail($comment);
            if ($user->can('manage own comments')) {
                return $user->id == $comment->user_id;
            }
        });
    }
}
