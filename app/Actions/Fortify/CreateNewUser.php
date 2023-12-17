<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','string', 'unique:users'],
            'password' => $this->passwordRules(),
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'district' => ['required', 'string', 'min:3', 'max:255'],
            'street' => ['required', 'string', 'min:3', 'max:255'], 
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [
            'firstname.min' => 'invalid firstname',
            'surname.min' => 'invalid surname',
            'city.min' => 'invalid city',
            'district.min' => 'invalid district',
            'street.min' => 'invalid street',
            ])->validate();           
        
        return User::create([
            'name' => $input['firstname'] . ' ' . $input['surname'],
            'firstname' => $input['firstname'], 
            'surname' => $input['surname'],    
            'email' => $input['email'],
            'phone' => $input['phone'],
            'city' => $input['city'],
            'district' => $input['district'],
            'street' => $input['street'],
            'address' => $input['city'] . ', ' . $input['district'] . ', ' . $input['street'], 
            'password' => Hash::make($input['password']),
        ]);         
        
    }
}
