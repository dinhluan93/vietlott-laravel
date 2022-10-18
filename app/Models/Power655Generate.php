<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power655Generate extends Model
{
    use HasFactory;

    protected $table = "power_655_generate";

    protected $fillable = [
        "stages",
        "number_1",
        "number_2",
        "number_3",
        "number_4",
        "number_5",
        "number_6",
    ];
    public $timestamps = true;
}
