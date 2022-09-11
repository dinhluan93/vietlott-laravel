<?php

namespace App\Services;

use App\Enums\EkycStatus;
use App\Exceptions\BusinessException;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
//use JWTAuth;

class UserService
{
    //private UserRepositoryInterface $userRepository;
    
    public function __construct(
        //UserRepositoryInterface $userRepository,
    ) {
        //$this->userRepository = $userRepository;
    }
    
}
