<?php

namespace App\Interfaces;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

interface AuthInterface
{

    public function register(AuthRequest $request);
    public function authenticate(Request $request);
    public function logout();
}