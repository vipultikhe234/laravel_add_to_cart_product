<?php

namespace App\Repositories;

use App\Helpers\ApiResponseHelper;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    /**
     * Retrieve a user record by email address.
     */
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
