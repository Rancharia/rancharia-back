<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function byUsername($username)
    {
        return $this->model->where('username', $username)->first();
    }

    public function current($request)
    {
        $user = $request->user();
        if($user){
            return response()->json($user, 200);
        }
        return response()->json(['message' => 'Não há usuário logado'], 404);
    }

}
