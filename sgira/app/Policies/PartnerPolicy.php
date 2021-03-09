<?php

namespace App\Policies;

use App\User;
use App\partner;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
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
     * @param  \App\partner  $partner
     * @return mixed
     */
    public function view(User $user, partner $partner)
    {
        return true;
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
     * @param  \App\partner  $partner
     * @return mixed
     */
    public function update(User $user, partner $partner)
    {
        return $user->is_admin == 2;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\partner  $partner
     * @return mixed
     */
    public function delete(User $user, partner $partner)
    {
        return $user->is_admin == 2;
    }
}
