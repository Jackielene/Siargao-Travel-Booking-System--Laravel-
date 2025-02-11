<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Destinations\Destinations;
use App\Models\Reservation\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect;
use File;
class AdminsController extends Controller
{
    public function viewLogin() {

        return view('admins.login');
    }


    public function checkLogin(Request $request) {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }
    


    public function index() {
        $destinationsCount = Destinations::count();
        $citiesCount = City::count();
        $adminsCount = Admin::count();
    
        return view('admins.index', compact('adminsCount', 'citiesCount', 'destinationsCount'));
    }
    

    public function logout(Request $request)
{
    auth()->guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('view.login'); // Redirect to login or another route
}


public function allAdmins() {
    $allAdmins = Admin::select()->orderBy('id', 'desc')->get();

    return view('admins.allAdmins', compact('allAdmins'));
}

public function createAdmins() {

    return view('admins.createadmins');
}
 

public function storeAdmins(Request $request) {

    $storeAdmins = Admin::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password),
    ]);

    if($storeAdmins) {
        
        return Redirect::route('admins.all.admins')->with(['success' => 'Admin created successfully']);
    }
}


public function allDestinations() {

    $allDestinations = Destinations::select()->orderBy('id', 'desc')->get();

    return view('admins.alldestinations', compact('allDestinations'));
}

public function createDestinations() {

    return view('admins.createdestinations');
}


public function storeDestinations(Request $request) {

    Request()->validate([
        "name" => "required|max:40",
        "population" => "required|max:40",
        "territory" => "required|max:40",
        "avg_price" => "required|max:40",
        "description" => "required|max:40",
        "image" => "required|max:40",
        "cities" => "required|max:40",
    ]);

    $destinationPath = 'assets/images/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);

    $storeDestinations = Destinations::create([
        "name" => $request->name,
        "population" => $request->population,
        "territory" => $request-> territory,
        "avg_price" => $request-> avg_price,
        "description" => $request-> description,
        "image" => $request-> image,
        "cities" => $request-> cities,
        "created_at" => $request-> created_at,
        "updated_at" => $request-> updated_at,
    ]);

    if($storeDestinations) {
        
        return Redirect::route('all.destinations')->with(['success' => 'Destination created successfully']);
    }
}

public function deleteDestinations($id) {

    $deleteDestinations = Destinations::find($id);

    if(File::exists(public_path('assets/images/' . $deleteDestinations->image))){
        File::delete(public_path('assets/images/' . $deleteDestinations->image));
    }else{
        //dd('File does not exists.');
    }

    $deleteDestinations->delete();

    if($deleteDestinations) {
        
        return Redirect::route('all.destinations')->with(['delete' => 'Destination deleted successfully']);
    }


}


public function allCities() {

    $cities = City::select()->orderBy('id', 'desc')->get();

    return view('admins.allcities', compact('cities'));
}


public function createCities()
{
    // Fetch all cities from the database to pass to the view
    $cities = City::all(); // assuming 'City' is your model

    // Pass the cities variable to the view
    return view('admins.createcities', compact('cities'));
}


public function storeCities(Request $request) {

    Request()->validate([
        "name" => "required|max:40",
        "image" => "required|max:7",
        "price" => "required|max:40",
        "num_days" => "required|max:2",
        "city_id" => "required|max:40",
    ]);

    $destinationPath = 'assets/images/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);

    $storeCities = City ::create([
        "name" => $request->name,
        "image" => $myimage,
        "price" => $request-> price,
        "num_days" => $request-> num_days,
        "city_id" => $request-> city_id,
    ]);

    if($storeCities) {
        
        return Redirect::route('all.cities')->with(['success' => 'City created successfully']);
    }
}

public function deleteCities($id) {

    $deleteCity = City::find($id);

    if(File::exists(public_path('assets/images/' . $deleteCity->image))){
        File::delete(public_path('assets/images/' . $deleteCity->image));
    }else{
        //dd('File does not exists.');
    }

    $deleteCity->delete();

    if($deleteCity) {
        
        return Redirect::route('all.cities')->with(['delete' => 'City deleted successfully']);
    }

}

public function allBookings() {

    $reservations = Reservation::select()->orderBy('id', 'desc')->get();

    return view('admins.allbookings', compact('reservations'));
}

public function editBookings($id) {

    $reservation = Reservation::find($id); // Use a singular variable

    return view('admins.editbooking', compact('reservation'));
}


public function updateBookings(Request $request, $id) {

    // Find the reservation by ID
    $editreservations = Reservation::find($id);

    // Update the reservation
    $editreservations->update($request->all());

    // Check if the update was successful, then redirect to 'all.bookings' route with a success message
    if ($editreservations) {
        return Redirect::route('all.bookings')->with(['update' => 'Booking status updated successfully']);
    }

    // If not successful, return back to the editbooking view with the updated reservation
    return view('admins.editbooking', compact('editreservations'));
}


}
