<?php

namespace App\Repositories\Interfaces;

interface Power655GenerateRepositoryInterface extends RepositoryInterface
{
    public function checkExistLottery(
        $stages,
        $number1,
        $number2,
        $number3,
        $number4,
        $number5,
        $number6
    );
}
