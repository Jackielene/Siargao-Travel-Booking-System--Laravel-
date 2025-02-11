<?php

namespace App\Models\Resort;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;

    protected $table = "resorts";

    protected $fillable = [
        "name",
        "images",
        "pricing",
        "numdays",
        "descrip",
        "resorts_id"
    ];

    public $timestamps = true;
}
