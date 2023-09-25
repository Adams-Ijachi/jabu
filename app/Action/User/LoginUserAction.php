<?php

namespace App\Action\User;

use App\Models\User;

class LoginUserAction
{

    /**
     * @throws \Exception
     */
    public function login($data): User|\Illuminate\Contracts\Auth\Authenticatable|null
    {

        if (\Auth::attempt($data)) {
            return auth()->user();
        }

        throw new \Exception('Invalid credentials');
    }
}
