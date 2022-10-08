<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\Power655RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Power655;

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
}
