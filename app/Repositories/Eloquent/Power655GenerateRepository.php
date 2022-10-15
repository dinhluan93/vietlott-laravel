<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\Power655GenerateRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Power655Generate;
use Illuminate\Support\Facades\DB;

class Power655GenerateRepository extends BaseRepository implements
    Power655GenerateRepositoryInterface
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Power655Generate::class;
    }

    public function checkExistLottery($stages, $number1, $number2, $number3, $number4, $number5, $number6)
    {
        return $this->model
            ->where("stages", $stages)
            ->where("number_1", $number1)
            ->where("number_2", $number2)
            ->where("number_3", $number3)
            ->where("number_4", $number4)
            ->where("number_5", $number5)
            ->where("number_6", $number6)
            ->count();
    }
}
