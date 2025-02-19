<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('view_posts');
    }

    public function create(User $user): bool
    {
        return $user->can('create_posts');
    }

    public function update(User $user, Post $post): bool
    {
        return $user->can('edit_posts');
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->can('delete_posts');
    }

    public function publish(User $user, Post $post): bool
    {
        return $user->can('publish_posts');
    }
}
