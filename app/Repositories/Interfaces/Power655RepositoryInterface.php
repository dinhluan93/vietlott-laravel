<?php

namespace App\Repositories\Interfaces;

interface Power655RepositoryInterface extends RepositoryInterface
{
    public function getPower655($stages = []);
    public function getNumberDuplicated();
    public function getOneLatest();
    public function getStagesLatest($limit = 10);
}
