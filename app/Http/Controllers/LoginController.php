<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $apiResponse = AuthController::getApiToken($credentials['email'], $credentials['password']);

    if ($apiResponse['status']) {
        $token = $apiResponse['data']['token'];

        Session::put('api_token', $token);

        $request->session()->regenerate();

        return redirect()->intended('/products');
    } else {
        $message = $apiResponse['message'];

        return back()->withErrors([
            'email' => $message,
        ]);
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
