<?php
namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthInterface
{
    protected ResponseService $response;
    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    public function register(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->response->result(true, "Usuario registrado con exito: " . $user->email, null, $user, $token);
    }
    public function authenticate(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return $this->response->result(false, "El correo y contraseña ingresado no coinciden con los registrados, intentelo otra vez.", null, null);

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->response->result(true, "El usuario ha sido autenticado exitosamente. " . $user->email, null, $user, $token);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->response->result(true, "Se ha cerrado la sesión del usuario autorizado.", null, true);
    }
}