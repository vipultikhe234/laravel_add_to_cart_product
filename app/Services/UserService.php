<?php

namespace App\Services;

use App\Helpers\ApiResponseHelper;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserService
{
    /**
     * Repository instance for performing user-related database operations.
     */
    protected $userRepository;

    /**
     * Inject UserRepository for user lookup operations.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Authenticate user and generate an access token.
     */
    public function login($request)
    {
        try {
            $user = $this->userRepository->findByEmail($request->email);

            // Validate user credentials
            if (!$user || !Hash::check($request->password, $user->password)) {
                $message = __('message.INVALID_CREDENTIALS');
                return ApiResponseHelper::error($message, JsonResponse::HTTP_UNAUTHORIZED);
            }
            
            // Successful authentication response
            $message = __('message.USER_LOGIN');
            return ApiResponseHelper::success($message, [
                'user' => $user,
                'token' => $user->createToken('auth')->plainTextToken
            ]);
        } catch (Exception $e) {
            Log::error('Login Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return ApiResponseHelper::internalServerError();
        }
    }
}
