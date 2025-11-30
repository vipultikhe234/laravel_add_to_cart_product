<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Service layer instance for handling user-related logic.
     */
    protected $userService;

    /**
     * Inject UserService for business logic operations.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle user login request.
     */
    public function login(LoginRequest $request)
    {
        try {
            return $this->userService->login($request);
        } catch (Exception $e) {
            Log::error('Login Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return ApiResponseHelper::internalServerError();
        }
    }
}
