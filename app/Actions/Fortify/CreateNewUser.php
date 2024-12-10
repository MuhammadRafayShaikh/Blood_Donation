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
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'string', 'max:15'],
            'city_id' => ['required', 'exists:cities,id'],
            'blood_group_id' => ['nullable', 'exists:groups,id'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'gender' => $input['gender'],
            'phone' => $input['phone'],
            'city_id' => $input['city_id'],
            'blood_group_id' => $input['donate_blood'] ? $input['blood_group_id'] : null,
        ]);
    }
}
