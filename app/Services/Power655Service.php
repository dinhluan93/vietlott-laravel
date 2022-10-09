<?php

namespace App\Services;

use App\Enums\EkycStatus;
use App\Exceptions\BusinessException;
use App\Models\User;
use App\Repositories\Interfaces\Power655RepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

//use JWTAuth;

class Power655Service
{
    private Power655RepositoryInterface $power655Repository;

    public function __construct(Power655RepositoryInterface $power655Repository)
    {
        $this->power655Repository = $power655Repository;
    }

    public function listPower655()
    {
        return $this->power655Repository->getPower655();
    }

    public function listDuplicated($number = 1)
    {
        return $this->power655Repository->getNumberDuplicated($number);
    }
}
