<?php

namespace App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

    protected $fillable = [
        "username",
        "phone_number",
        "num_guests",
        "check_in_date",
        "destination",
        "prices",
        "user_ids",
        "status_ids"
    ];

    public $timestamps = true;
}
