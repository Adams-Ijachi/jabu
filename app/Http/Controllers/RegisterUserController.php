<?php

namespace App\Http\Controllers;

use App\Action\User\CreateUserAction;
use App\Http\Requests\CreateUserRequest;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('register-user');
    }

    public function store (CreateUserRequest $request)
    {
        $user = app(CreateUserAction::class)->create($request->validated());

        auth()->login($user);

        return redirect()->route('tasks');
    }
}
