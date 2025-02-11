<?php

namespace App\Models\Destinations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;

    protected $table = "destinations";

    protected $fillable = [
        "name",
        "population",
        "territory",
        "avg_price",
        "description",
        "image",
        "cities"
    ];

    public $timestamps = true;
}
