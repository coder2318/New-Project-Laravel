<?php


namespace App\Services;


use App\Repository\LoginSocialiteRepository;
use Illuminate\Support\Facades\Auth;

class LoginSocialiteService
{
    protected $repo;

    public function __construct(LoginSocialiteRepository $repo)
    {

        $this->repo = $repo;
    }

    public function check($user){
        if(!$this->repo->checkUser($user)){
            $check_user = $this->repo->store($user);
        } else {
            $check_user = $this->repo->update($this->repo->checkUser($user), $user);
        }
        Auth::login($check_user, true);
    }
}
