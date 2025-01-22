<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tank extends Model
{
    /** @use HasFactory<\Database\Factories\TankFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        "crewnumber",
        "country",
        "wars",
        "cost",
        "releaseyear",
        "description",
        "active",
        "tanktype_id"
    ];

}
