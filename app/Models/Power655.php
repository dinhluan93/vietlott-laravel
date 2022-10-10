<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Power655 extends Model
{
    use HasFactory;

    protected $table = "power_655";

    //protected $fillable = ["name", "description", "remarks"];
    public $timestamps = true;

    public function price()
    {
        return $this->hasOne(Power655Price::class, "power_655_id", 'id');
    }
}
