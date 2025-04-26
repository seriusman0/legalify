<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Blog $blog)
    {
        return true; // Public access to view blogs
    }

    public function create(User $user)
    {
        return $user->hasRole('admin') || $user->hasPermissionTo('create blogs');
    }

    public function update(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id || 
               $user->hasRole('admin') || 
               $user->hasPermissionTo('edit blogs');
    }

    public function delete(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id || 
               $user->hasRole('admin') || 
               $user->hasPermissionTo('delete blogs');
    }

    public function restore(User $user, Blog $blog)
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Blog $blog)
    {
        return $user->hasRole('admin');
    }
}
