<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LoginController extends \Laravel\Nova\Http\Controllers\LoginController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'name';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username());
        $credentials['password'] = null;
        return $credentials;
    }


}
