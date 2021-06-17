<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class LoginController extends Controller
{
    /**
     * Display a login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Login attempt.
     *
     * @return \Illuminate\Http\Response
     */
    public function attempt(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Auth::login($credentials, $remember = true);
            return redirect()->route('vehicle.index');
        }

        return Redirect::back()->withErrors('Wrong credentials.');
    }

    /**
     * Logout action.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
