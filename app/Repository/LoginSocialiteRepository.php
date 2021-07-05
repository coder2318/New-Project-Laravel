<?php


namespace App\Repository;


use App\User;

class LoginSocialiteRepository
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function checkUser($user)
    {
        return $this->model->where('email', $user->getEmail())->first();
    }
    public function store($user)
    {
        $new_user =  $this->model->create([
           'name' => $user->getNickname()??$user->getName(),
            'email' => $user->getEmail(),
            'provider_id' => $user->getId()
        ]);

        return $new_user;
    }

    public function update($check_user, $user)
    {
        $check_user->update([
            'name' => $user->getNickname()??$user->getName(),
            'email' => $user->getEmail(),
            'provider_id' => $user->getId()
        ]);
        return $check_user;
    }
}
