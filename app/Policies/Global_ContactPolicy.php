<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\Global_Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class Global_ContactPolicy
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
     * @param  \App\Models\Global_Contact  $globalContact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Global_Contact $globalContact)
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
     * @param  \App\Models\Global_Contact  $globalContact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Global_Contact $globalContact)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Global_Contact  $globalContact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Global_Contact $globalContact)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Global_Contact  $globalContact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Global_Contact $globalContact)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Global_Contact  $globalContact
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Global_Contact $globalContact)
    {
        //
    }
    public function eligible_to_add(User $user, Global_Contact $contact)
    {
        // checking  if this global contact already exists in user contact list
        $find_contact = Contact::select('id')->where('name', '=', $contact->name)
            ->where('user_id', '=', $user->id)
            ->first();
        // dd($find_contact, $user->id);
        return $user->id !== $contact->user_id && ($find_contact == null ? true : false);
        // ? Response::allow() : Response::deny('You already have this contact');
    }

    public function eligible_to_manipulate(User $user, Global_Contact $contact)
    {
        return ($user->id === $contact->user_id || $user->role == 'admin')
        ? Response::allow() : Response::deny('You already have this contact');
    }
}
