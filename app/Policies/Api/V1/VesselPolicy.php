<?php

namespace App\Policies\Api\V1;

use App\Models\Api\V1\Vessel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VesselPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any vessel.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the vessel.
     *
     * @param  User  $user
     * @param  Vessel  $vessel
     * @return mixed
     */
    public function view(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can create vessel.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the vessel.
     *
     * @param  User  $user
     * @param  Vessel  $vessel
     * @return mixed
     */
    public function update(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can delete the vessel.
     *
     * @param  User  $user
     * @param  Vessel  $vessel
     * @return mixed
     */
    public function delete(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can restore the vessel.
     *
     * @param  User  $user
     * @param  Vessel  $vessel
     * @return mixed
     */
    public function restore(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the vessel.
     *
     * @param  User  $user
     * @param  Vessel  $vessel
     * @return mixed
     */
    public function forceDelete(User $user, Vessel $vessel)
    {
        //
    }
}
