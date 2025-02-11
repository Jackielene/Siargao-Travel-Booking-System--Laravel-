<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation\Reservation;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function bookings(): \Illuminate\View\View
    {
        // Retrieve bookings for the authenticated user
        $bookings = Reservation::where('user_ids', Auth::user()->id)
            ->orderBy('id', 'asc')
            ->get();

        return view('users.bookings', compact('bookings'));
    }
}
