<?php

namespace App\Policies;

use App\User;
use App\bonification;
use Illuminate\Auth\Access\HandlesAuthorization;

class BonificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\bonification  $bonification
     * @return mixed
     */
    public function view(User $user, bonification $bonification)
    {
        return ($user->is_admin == 2 || $bonification->student_id == $user->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin == 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\bonification  $bonification
     * @return mixed
     */
    public function update(User $user, bonification $bonification)
    {
        return $user->is_admin == 2;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\bonification  $bonification
     * @return mixed
     */
    public function delete(User $user, bonification $bonification)
    {
        return $user->is_admin == 2;
    }
}
