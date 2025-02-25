<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UserRegisterRequest;
use App\Services\AuthService;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $result = $this->authService->register($request->all());

        return ApiResponse::success(
            $result,
            'User registered successfully',
            201,
            $result['token']
        );
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'cpf' => 'required',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('cpf', 'password');
        $token = $this->authService->login($credentials);

        if (!$token) {
            return ApiResponse::error('Unauthorized', 401);
        }

        $user = $this->authService->getAuthenticatedUser();

        return ApiResponse::success(
            [
             'user' => $user,
             'profiles' => $user->activeProfile->profile,
             'addresses' => $user->addresses,
            ],
            'Login feito com sucesso!'
        );
    }

    public function me(): JsonResponse
    {
        $user = $this->authService->getAuthenticatedUser();
        return ApiResponse::success($user);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return ApiResponse::success([], 'Successfully logged out');
    }

    public function refresh(): JsonResponse
    {
        $token = $this->authService->refresh();
        return ApiResponse::success(
            ['access_token' => $token, 'token_type' => 'bearer', 'expires_in' => 60],
            'Token refreshed successfully'
        );
    }
}
