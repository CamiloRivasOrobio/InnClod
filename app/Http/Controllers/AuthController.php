<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public AuthService $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function register(AuthRequest $request)
    {
        return $this->authService->register($request);
    }
    public function authenticate(Request $request)
    {
        return $this->authService->authenticate($request);
    }
    public function logout()
    {
        return $this->authService->logout();
    }
}