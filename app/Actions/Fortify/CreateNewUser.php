<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:15', 'unique:users'],
            'password' => $this->passwordRules(),
            'nik' => ['required', 'numeric', 'min:16', 'max:16'],
            'domisili' => ['required', 'string', 'max:20'],
            'nomor_hp' => ['required', 'numeric', 'min:12', 'max:12'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'riwayat_pendidikan' => ['required', 'string', 'max:255'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'nik' => $input['nik'],
            'domisili' => $input['domisili'],
            'nomor_hp' => $input['nomor_hp'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'riwayat_pendidikan' => $input['riwayat_pendidikan'],
        ]);
    }
}
