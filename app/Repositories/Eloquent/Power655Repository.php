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
    public function getPower655($stages = [])
    {
        $query = $this->model;
        if (!empty($stages)) {
            $query = $query->whereNotIn("stages", $stages);
        }
        return $query
            ->orderBy("stages", "DESC")
            ->paginate(config("pagination.limit"));
    }

    public function getNumberDuplicated($number = 1, $stage = [])
    {
        return $this->model
            ->select("number_" . $number, DB::raw("COUNT(*) as number_count"))
            ->groupBy("number_" . $number)
            ->havingRaw("count(id) < ?", [20])
            ->whereNotIn("stages", $stage)
            ->orderBy("number_count", "DESC")
            ->limit(config("pagination.power655_limit"))
            ->get();
    }

    public function getOneLatest()
    {
        return $this->model->orderBy("stages", "DESC")->first();
    }

    public function getStagesLatest($limit = 10)
    {
        return $this->model
            ->select("id", "stages")
            ->limit($limit)
            ->orderBy("stages", "DESC")
            ->get();
    }

    public function topDuplicateNumber($number, $limit = 0)
    {
        $query = $this->model
            ->select(
                "number_" . $number,
                DB::raw("COUNT(number_" . $number . ") as number_count")
            )
            ->groupBy("number_" . $number)
            ->orderBy("number_count", "DESC");
        if ($limit > 0) {
            $query = $query->limit($limit);
        }
        return $query->get();
    }
}
