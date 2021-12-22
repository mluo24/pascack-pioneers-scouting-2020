<?php

namespace App\Policies;

use App\User;
use App\PitDataEntry;
use Illuminate\Auth\Access\HandlesAuthorization;

class PitDataEntryPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any pit data entries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission("browse_pit_data_entries");
    }

    /**
     * Determine whether the user can view the pit data entry.
     *
     * @param  \App\User  $user
     * @param  \App\PitDataEntry  $pitDataEntry
     * @return mixed
     */
    public function view(User $user, PitDataEntry $pitDataEntry)
    {
        return $user->hasPermission("read_pit_data_entries");
    }

    /**
     * Determine whether the user can create pit data entries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("add_pit_data_entries");
    }

    /**
     * Determine whether the user can update the pit data entry.
     *
     * @param  \App\User  $user
     * @param  \App\PitDataEntry  $pitDataEntry
     * @return mixed
     */
    public function update(User $user, PitDataEntry $pitDataEntry)
    {
        //
    }

    /**
     * Determine whether the user can delete the pit data entry.
     *
     * @param  \App\User  $user
     * @param  \App\PitDataEntry  $pitDataEntry
     * @return mixed
     */
    public function delete(User $user, PitDataEntry $pitDataEntry)
    {
        //
    }

    /**
     * Determine whether the user can restore the pit data entry.
     *
     * @param  \App\User  $user
     * @param  \App\PitDataEntry  $pitDataEntry
     * @return mixed
     */
    public function restore(User $user, PitDataEntry $pitDataEntry)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pit data entry.
     *
     * @param  \App\User  $user
     * @param  \App\PitDataEntry  $pitDataEntry
     * @return mixed
     */
    public function forceDelete(User $user, PitDataEntry $pitDataEntry)
    {
        //
    }
}
