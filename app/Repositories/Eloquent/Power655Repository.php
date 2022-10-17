<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\Power655RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Power655;
use Illuminate\Support\Facades\DB;

class Power655Repository extends BaseRepository implements
    Power655RepositoryInterface
{
    /**
     * getModel
     * @return string
     */
    public function getModel(): string
    {
        return Power655::class;
    }

    /**
     * @return mixed
     */
    public function getPower655()
    {
        return $this->model
            ->orderBy("stages", "DESC")
            ->paginate(config("pagination.limit"));
    }

    public function getNumberDuplicated($number = 1)
    {
        return $this->model
            ->select("number_" . $number, DB::raw("COUNT(*) as number_count"))
            ->groupBy("number_" . $number)
            ->havingRaw("count(id) <= ?", [30])
            ->orderBy("number_count", "ASC")
            ->limit(config("pagination.power655_limit"))
            ->get();
    }

    public function getOneLatest()
    {
        return $this->model->orderBy("stages", "DESC")->first();
    }
}
