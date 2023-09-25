<?php

namespace App\Action\User;

class CreateUserAction
{

    public function create($data)
    {
        return app(\App\Models\User::class)->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

}
