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

    public function listDuplicatedNumber($totalNumber = 10)
    {
        $data1 = $this->power655Repository->getNumberDuplicated(1)->toArray();
        $data2 = $this->power655Repository->getNumberDuplicated(2)->toArray();
        $data3 = $this->power655Repository->getNumberDuplicated(3)->toArray();
        $data4 = $this->power655Repository->getNumberDuplicated(4)->toArray();
        $data5 = $this->power655Repository->getNumberDuplicated(5)->toArray();
        $data6 = $this->power655Repository->getNumberDuplicated(6)->toArray();
        $data7 = $this->power655Repository->getNumberDuplicated(7)->toArray();
        $data = [];
        for ($i = 0; $i < $totalNumber; $i++) {
            $data[$data1[$i]["number_1"]] = $data1[$i]["number_count"];
        }
        for ($i = 0; $i < $totalNumber; $i++) {
            if (array_key_exists($data2[$i]["number_2"], $data)) {
                $key_existed = $data2[$i]["number_2"];
                $data[$key_existed] =
                    $data[$key_existed] + $data2[$i]["number_count"];
            } else {
                $data[$data2[$i]["number_2"]] = $data2[$i]["number_count"];
            }
        }
        for ($i = 0; $i < $totalNumber; $i++) {
            if (array_key_exists($data3[$i]["number_3"], $data)) {
                $key_existed = $data3[$i]["number_3"];
                $data[$key_existed] =
                    $data[$key_existed] + $data3[$i]["number_count"];
            } else {
                $data[$data3[$i]["number_3"]] = $data3[$i]["number_count"];
            }
        }
        for ($i = 0; $i < $totalNumber; $i++) {
            if (array_key_exists($data4[$i]["number_4"], $data)) {
                $key_existed = $data4[$i]["number_4"];
                $data[$key_existed] =
                    $data[$key_existed] + $data4[$i]["number_count"];
            } else {
                $data[$data4[$i]["number_4"]] = $data4[$i]["number_count"];
            }
        }
        for ($i = 0; $i < $totalNumber; $i++) {
            if (array_key_exists($data5[$i]["number_5"], $data)) {
                $key_existed = $data5[$i]["number_5"];
                $data[$key_existed] =
                    $data[$key_existed] + $data5[$i]["number_count"];
            } else {
                $data[$data5[$i]["number_5"]] = $data5[$i]["number_count"];
            }
        }
        for ($i = 0; $i < $totalNumber; $i++) {
            if (array_key_exists($data6[$i]["number_6"], $data)) {
                $key_existed = $data6[$i]["number_6"];
                $data[$key_existed] =
                    $data[$key_existed] + $data6[$i]["number_count"];
            } else {
                $data[$data6[$i]["number_6"]] = $data6[$i]["number_count"];
            }
        }
        for ($i = 0; $i < $totalNumber; $i++) {
            if (array_key_exists($data7[$i]["number_7"], $data)) {
                $key_existed = $data7[$i]["number_7"];
                $data[$key_existed] =
                    $data[$key_existed] + $data7[$i]["number_count"];
            } else {
                $data[$data7[$i]["number_7"]] = $data7[$i]["number_count"];
            }
        }
        return collect($data)->sortDesc();
    }

    public function randomLottery($data)
    {
        $totalRow = 10;
        $lottery = [];
        for ($i = 0; $i < $totalRow; $i++) {
            $number = [];
            for ($j = 0; $j < 6; $j++) {
                $numberRandom = $this->randomNumberInArray($data);
                if (in_array($numberRandom, $number)) {
                    $numberRandom = $this->randomNumberInArray($data);
                }
                array_push($number,$numberRandom);
            }
            array_push($lottery, collect($number)->sort());
        }
        return $lottery;
    }

    private function randomNumberInArray($data)
    {
        return array_rand($data, 1);
    }
}
