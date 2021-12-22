<?php

namespace App\Policies;

use App\User;
use App\DataEntry;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataEntryPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any data entries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission("browse_data_entries");
    }

    /**
     * Determine whether the user can view the data entry.
     *
     * @param  \App\User  $user
     * @param  \App\DataEntry  $dataEntry
     * @return mixed
     */
    public function view(User $user, DataEntry $dataEntry)
    {
        return $user->hasPermission("read_data_entries");
    }

    /**
     * Determine whether the user can create data entries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("add_data_entries");
    }

    /**
     * Determine whether the user can update the data entry.
     *
     * @param  \App\User  $user
     * @param  \App\DataEntry  $dataEntry
     * @return mixed
     */
    public function update(User $user, DataEntry $dataEntry)
    {
        //
    }

    /**
     * Determine whether the user can delete the data entry.
     *
     * @param  \App\User  $user
     * @param  \App\DataEntry  $dataEntry
     * @return mixed
     */
    public function delete(User $user, DataEntry $dataEntry)
    {
        return $user->hasPermission("delete_data_entries");
    }

    /**
     * Determine whether the user can restore the data entry.
     *
     * @param  \App\User  $user
     * @param  \App\DataEntry  $dataEntry
     * @return mixed
     */
    public function restore(User $user, DataEntry $dataEntry)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the data entry.
     *
     * @param  \App\User  $user
     * @param  \App\DataEntry  $dataEntry
     * @return mixed
     */
    public function forceDelete(User $user, DataEntry $dataEntry)
    {
        //
    }
}
