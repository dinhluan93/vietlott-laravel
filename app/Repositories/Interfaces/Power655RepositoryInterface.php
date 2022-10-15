<?php

namespace App\Repositories\Interfaces;

interface Power655RepositoryInterface extends RepositoryInterface
{
    public function getPower655();
    public function getNumberDuplicated();
    public function getOneLatest();
}
