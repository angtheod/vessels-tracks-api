<?php

namespace App\Policies;

use App\Models\Vessel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VesselPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any vessel.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the vessel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vessel  $vessel
     * @return mixed
     */
    public function view(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can create vessel.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the vessel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vessel  $vessel
     * @return mixed
     */
    public function update(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can delete the vessel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vessel  $vessel
     * @return mixed
     */
    public function delete(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can restore the vessel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vessel  $vessel
     * @return mixed
     */
    public function restore(User $user, Vessel $vessel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the vessel.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vessel  $vessel
     * @return mixed
     */
    public function forceDelete(User $user, Vessel $vessel)
    {
        //
    }
}
