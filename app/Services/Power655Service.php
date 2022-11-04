<?php

namespace App\Services;

use App\Enums\EkycStatus;
use App\Exceptions\BusinessException;
use App\Models\User;
use App\Repositories\Interfaces\Power655RepositoryInterface;
use App\Repositories\Interfaces\Power655GenerateRepositoryInterface;
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
    private Power655GenerateRepositoryInterface $power655GenerateRepository;

    public function __construct(
        Power655RepositoryInterface $power655Repository,
        Power655GenerateRepositoryInterface $power655GenerateRepository
    ) {
        $this->power655Repository = $power655Repository;
        $this->power655GenerateRepository = $power655GenerateRepository;
    }

    public function listPower655($stages = [])
    {
        return $this->power655Repository->getPower655($stages);
    }

    public function listDuplicatedNumber($totalNumber = 10, $stage = [])
    {
        $oneLatest = $this->power655Repository->getOneLatest();
        $stages = !empty($stage) ? $stage : [$oneLatest->stages];
        $data1 = $this->power655Repository
            ->getNumberDuplicated(1, $stages)
            ->toArray();
        $data2 = $this->power655Repository
            ->getNumberDuplicated(2, $stages)
            ->toArray();
        $data3 = $this->power655Repository
            ->getNumberDuplicated(3, $stages)
            ->toArray();
        $data4 = $this->power655Repository
            ->getNumberDuplicated(4, $stages)
            ->toArray();
        $data5 = $this->power655Repository
            ->getNumberDuplicated(5, $stages)
            ->toArray();
        $data6 = $this->power655Repository
            ->getNumberDuplicated(6, $stages)
            ->toArray();
        $data7 = $this->power655Repository
            ->getNumberDuplicated(7, $stages)
            ->toArray();
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
        $totalRow = 40;
        $lottery = [];
        for ($i = 0; $i < $totalRow; $i++) {
            $number = [];
            for ($j = 0; $j < 6; $j++) {
                $numberRandom = $this->randomNumberInArray($data);
                if (!in_array($numberRandom, $number)) {
                    array_push($number, $numberRandom);
                }
            }
            if (count($number) == 6) {
                $numberCollectSorted = collect($number)->sort();
                array_push($lottery, $numberCollectSorted);
                $numberSorted = array_values(
                    (array) $numberCollectSorted->values()
                )[0];
                /*$this->saveRandomLottery655(
                    $numberSorted[0],
                    $numberSorted[1],
                    $numberSorted[2],
                    $numberSorted[3],
                    $numberSorted[4],
                    $numberSorted[5]
                );*/
            }
        }
        return $lottery;
    }

    public function saveRandomLottery655(
        $number1,
        $number2,
        $number3,
        $number4,
        $number5,
        $number6
    ) {
        $power655Latest = $this->power655Repository->getOneLatest();
        $lotteryExisted = $this->power655GenerateRepository->checkExistLottery(
            $power655Latest->stages,
            $number1,
            $number2,
            $number3,
            $number4,
            $number5,
            $number6
        );
        if ($lotteryExisted == 0) {
            DB::beginTransaction();
            try {
                $this->power655GenerateRepository->create([
                    "stages" => $power655Latest->stages,
                    "number_1" => $number1,
                    "number_2" => $number2,
                    "number_3" => $number3,
                    "number_4" => $number4,
                    "number_5" => $number5,
                    "number_6" => $number6,
                ]);
                DB::commit();
                return true;
            } catch (Exception $e) {
                Log::error($e->getMessage());
                DB::rollback();
                throw $e;
            }
        }
    }

    private function randomNumberInArray($data)
    {
        return $data[array_rand($data, 1)];
    }

    public function getStagesLatest($limit = 10)
    {
        return $this->power655Repository->getStagesLatest($limit);
    }

    public function topDuplicateNumber()
    {
        return [
            $this->power655Repository->topDuplicateNumber(1),
            $this->power655Repository->topDuplicateNumber(2),
            $this->power655Repository->topDuplicateNumber(3),
            $this->power655Repository->topDuplicateNumber(4),
            $this->power655Repository->topDuplicateNumber(5),
            $this->power655Repository->topDuplicateNumber(6),
            $this->power655Repository->topDuplicateNumber(7),
        ];
    }

    public function listAfterTopDuplicateNumber()
    {
        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        $data5 = [];
        $data6 = [];

        $number1 = $this->power655Repository->topDuplicateNumber(1, 15); //15 number
        foreach ($number1 as $value) {
            $data1[] = $value->number_1;
        }
        //20 number , is different Number 1
        $number2 = $this->power655Repository->topDuplicateNumber(2, 20);
        foreach ($number2 as $value) {
            if (!in_array($value->number_2, $data1)) {
                $data2[] = $value->number_2;
            }
        }
        //25 number , is different Number 2 and number 1
        $number3 = $this->power655Repository->topDuplicateNumber(3, 25);
        foreach ($number3 as $value) {
            if (
                !in_array($value->number_3, $data2) &&
                !in_array($value->number_3, $data1)
            ) {
                $data3[] = $value->number_3;
            }
        }
        //25 number , is different Number 3 and number 2
        $number4 = $this->power655Repository->topDuplicateNumber(4, 25);
        foreach ($number4 as $value) {
            if (
                !in_array($value->number_4, $data3) &&
                !in_array($value->number_4, $data2)
            ) {
                $data4[] = $value->number_4;
            }
        }
        //10 number , is different Number 4 and number 3
        $number5 = $this->power655Repository->topDuplicateNumber(5, 13);
        foreach ($number5 as $value) {
            if (
                !in_array($value->number_5, $data4) &&
                !in_array($value->number_5, $data3)
            ) {
                $data5[] = $value->number_5;
            }
        }
        //13 number , is different Number 5 and number 4
        $number6 = $this->power655Repository->topDuplicateNumber(6, 23);
        foreach ($number6 as $value) {
            if (
                !in_array($value->number_6, $data5) &&
                !in_array($value->number_6, $data4) &&
                !in_array($value->number_6, $data3) &&
                !in_array($value->number_6, $data2)
            ) {
                $data6[] = $value->number_6;
            }
        }
        return [$data1, $data2, $data3, $data4, $data5, $data6];
    }

    public function listGenerateLottery()
    {
        return $this->power655GenerateRepository->getGenerate();
    }

    public function totalTodayGenerateLottery()
    {
        return $this->power655GenerateRepository->checkTodayAdded();
    }

    public function listGenerateLotteryToday()
    {
        return $this->power655GenerateRepository->getGenerateToday();
    }

    public function deleteRandomToday()
    {
        return $this->power655GenerateRepository->deleteTodayAdded();
    }
}
