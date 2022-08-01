<?php

namespace App\Policies;

use App\Models\Api\V1\Track;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any api/V1/Track.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the api/V1/Track.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Api\V1\Track  $track
     * @return mixed
     */
    public function view(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can create Track.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the api/V1/Track.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Api\V1\Track  $track
     * @return mixed
     */
    public function update(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can delete the api/V1/Track.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Api\V1\Track  $track
     * @return mixed
     */
    public function delete(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can restore the api/V1/Track.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Api\V1\Track  $track
     * @return mixed
     */
    public function restore(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Track.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Api\V1\Track  $track
     * @return mixed
     */
    public function forceDelete(User $user, Track $track)
    {
        //
    }
}
