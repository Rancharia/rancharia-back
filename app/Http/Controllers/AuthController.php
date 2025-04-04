<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    function login(Request $request)
    {
        return $this->authRepository->login($request);

    }

    function logout(Request $request)
    {
        return $this->authRepository->logout($request);
    }


}
