<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\Power655GenerateRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Power655Generate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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

    public function checkExistLottery(
        $stages,
        $number1,
        $number2,
        $number3,
        $number4,
        $number5,
        $number6
    ) {
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

    public function checkTodayAdded()
    {
        return $this->model
            ->whereBetween("created_at", [
                Carbon::now()->format("Y-m-d") . " 00:00:00",
                Carbon::now()->format("Y-m-d H:i:s"),
            ])
            ->count();
    }

    public function getGenerate()
    {
        return $this->model
            ->orderBy("stages", "DESC")
            ->paginate(config("pagination.limit"));
    }

    /*
    public function getGenerateToday()
    {
        return $this->model
            ->whereBetween("created_at", [
                Carbon::now()->format("Y-m-d") . " 00:00:00",
                Carbon::now()->format("Y-m-d H:i:s"),
            ])
            ->orderBy("stages", "DESC")
            ->get();
    }*/

    public function getGenerateToday($limit = 20)
    {
        return $this->model
            ->limit($limit)
            ->orderBy("stages", "DESC")
            ->get();
    }

    public function deleteTodayAdded()
    {
        return $this->model
            ->whereBetween("created_at", [
                Carbon::now()->format("Y-m-d") . " 00:00:00",
                Carbon::now()->format("Y-m-d H:i:s"),
            ])
            ->delete();
    }
}
