<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City\City;
use App\Models\Resort\Resort; 
use App\Models\Reservation\Reservation;
use Session;
use Redirect;

class TravelingController extends Controller
{
    public function about($id)
    {
        $cities = City::orderBy('id', 'asc')->get();
        $resorts = Resort::whereIn('id', [1, 2, 3, 4, 5, 6])
            ->orderByRaw("FIELD(id, 1, 2, 3, 4, 5, 6)")
            ->get();

        return view('traveling.about', compact('cities', 'resorts'));
    }

    public function makeReservations($id)
    {
        $city = City::find($id);
        $cities = City::all();

        if ($city === null) {
            return redirect()->back()->withErrors('City not found.')->withInput();
        }

        return view('traveling.reservation', compact('city', 'cities'));
    }

    public function reservationSuccess()
    {
        // This method is called after a reservation is made
        // Here we don't need to redirect; it's handled in storeReservations
        return view('traveling.reservation_success'); // Optionally show a success page
    }

    public function storeReservations(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'num_guests' => 'required|integer|min:1',
            'check_in_date' => 'required|date|after:today',
            'destination_id' => 'required|integer|exists:cities,id',
            'user_ids' => 'required|integer',
        ]);

        $city = City::find($request->destination_id);
        
        if ($city === null) {
            return redirect()->back()->withErrors('City not found.')->withInput();
        }

        // Check if the check-in date is valid
        if ($request->check_in_date > date("Y-m-d")) {
            $totalPrices = (int)$city->price * (int)$request->num_guests;

            // Create the reservation
            $storeReservations = Reservation::create([
                "username" => $request->username,
                "phone_number" => $request->phone_number,
                "num_guests" => $request->num_guests,
                "check_in_date" => $request->check_in_date,
                "destination" => $city->name,
                "prices" => $totalPrices,
                "user_ids" => $request->user_ids,
            ]);

            if ($storeReservations) {
                Session::put('payment_amount', $totalPrices); // Store the total price in session
                Session::flash('success', 'Reservation made successfully! Proceed to payment.');
                return Redirect::route('traveling.pay'); // Redirect to payment route
            }
        } else {
            return redirect()->back()->withErrors('Choose only a date ahead.')->withInput();
        }

        return redirect()->back()->with('error', 'Reservation could not be made. Please try again.');
    }

    public function payWithPaypal()
    {
        $amount = Session::get('payment_amount'); // Retrieve the amount from session
        if (!$amount) {
            return redirect()->route('traveling.about')->withErrors('No payment amount found.');
        }

        return view('traveling.pay', compact('amount')); // Pass the amount to the view
    }

    public function success()
    {
        Session::forget('prices');
        return view('traveling.success');
    }

    public function deals() {

        $cities = City::orderBy('id', 'asc')->get();
        return view('traveling.deals', compact('cities'));
    }
}
