<?php

namespace App\Http\Controllers;

use App\Action\User\LoginUserAction;
use App\Http\Requests\LoginUserRequest;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('login-user');
    }

    public function store (LoginUserRequest $request)
    {
        try {
            $user = app(LoginUserAction::class)->login($request->validated());

            return redirect()->route('tasks');
        }catch (\Exception $e) {
            return back()->withErrors([
                'email' => $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
