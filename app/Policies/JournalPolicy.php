<?php

namespace App\Policies;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JournalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the journal is public, if public then let user view.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewPublic(User $user, Journal $journal)
    {
        $accountType = User::find($journal->user_id)->type;
        return $accountType == 'Public';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Journal $journal)
    {
        return $user->id===$journal->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Journal $journal)
    {
        return $user->id===$journal->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Journal $journal)
    {
        return $user->id===$journal->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Journal $journal)
    {
        return $user->id===$journal->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Journal $journal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Journal $journal)
    {
        //
    }
}
