<?php

namespace App\Http\Controllers\Api;

use App\Contract\AuthContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginApiRequest;
use App\Http\Requests\RegisterApiRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Utils\ApiResponseUtils;

class AuthController extends Controller
{

    protected AuthContract $service;

    public function __construct(AuthContract $service)
    {
        $this->service = $service;
    }

    public function login(LoginApiRequest $request): JsonResponse
    {
        $response = $this->service->login($request->all());
        return ApiResponseUtils::response($response, "success login");
    }

    public function register(RegisterApiRequest $request): JsonResponse
    {
        $response = $this->service->register($request->all());
        return ApiResponseUtils::response($response, "success register");
    }

    public function logout(): JsonResponse
    {
        $response = $this->service->logout();
        return ApiResponseUtils::response($response, "success register");
    }
}
