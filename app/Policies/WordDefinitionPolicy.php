<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WordDefinition;
use Illuminate\Auth\Access\HandlesAuthorization;

class WordDefinitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WordDefinition  $wordDefinition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, WordDefinition $wordDefinition)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WordDefinition  $wordDefinition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, WordDefinition $wordDefinition)
    {
        return $user->id === $wordDefinition->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WordDefinition  $wordDefinition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, WordDefinition $wordDefinition)
    {
        return $user->id === $wordDefinition->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WordDefinition  $wordDefinition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, WordDefinition $wordDefinition)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WordDefinition  $wordDefinition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, WordDefinition $wordDefinition)
    {
        //
    }
}
