<?php

namespace App\Http\Controllers;

use App\Auth\UserAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userAuth;

    public function __construct(UserAuth $userAuth)
    {
        $this->middleware('auth')->only(['logout']);
        $this->userAuth = $userAuth;

    }

    public function show()
    {
        $redirectionPage = str_replace($this->getBaseURL(), "", \request()->session()->previousUrl());
        return view('auth.login')
            ->with('redirectionPath', $redirectionPage);
    }

    public function register(){
        return  $this->userAuth->register();
    }

    public function recoverPassword()
    {
        return $this->userAuth->recoverPassword();
    }

    public function login(){
        return $this->userAuth->login();
    }

    public function logout(){
        return  $this->userAuth->logout();
    }

    public function getBaseURL(){
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

        $url = $protocol . $_SERVER['HTTP_HOST'];

        return $url; // Outputs: Query String
    }
}
