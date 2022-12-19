<?php

namespace App\Policies;

use App\Models\BookAuthor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookAuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param BookAuthor $bookAuthor
     * @return mixed
     */
    public function view(User $user, BookAuthor $bookAuthor): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param BookAuthor $bookAuthor
     * @return mixed
     */
    public function update(User $user, BookAuthor $bookAuthor): bool
    {
        return $user->id == $bookAuthor->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param BookAuthor $bookAuthor
     * @return mixed
     */
    public function delete(User $user, BookAuthor $bookAuthor): bool
    {
        return $user->id == $bookAuthor->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param BookAuthor $bookAuthor
     * @return mixed
     */
    public function restore(User $user, BookAuthor $bookAuthor): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param BookAuthor $bookAuthor
     * @return mixed
     */
    public function forceDelete(User $user, BookAuthor $bookAuthor): bool
    {
        return false;
    }
}
