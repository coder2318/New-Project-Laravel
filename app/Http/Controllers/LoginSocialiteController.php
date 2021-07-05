<?php

namespace App\Http\Controllers;

use App\Services\LoginSocialiteService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialiteController extends Controller
{
    protected $service;

    public function __construct(LoginSocialiteService $service)
    {
        $this->service = $service;
    }

    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
//        dd($user);
        $this->service->check($user);
        return redirect()->route('welcome');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
//        dd($user);
        $this->service->check($user);
        return redirect()->route('welcome');
    }
}
