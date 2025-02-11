@extends('layouts.app')

@section('content')
<div class="second-page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4>Book Preferred Deal Here</h4>
        <h2>Make Your Reservation</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Is ipsum suspendisse ultrices gravida.</p>
        <div class="main-button"><a href="about.html">Discover More</a></div>
      </div>
    </div>
  </div>
</div>

<div class="more-info reservation-info">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="info-item">
          <i class="fa fa-phone"></i>
          <h4>Make a Phone Call</h4>
          <a href="#">+639 456 789 (0)</a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="info-item">
          <i class="fa fa-envelope"></i>
          <h4>Contact Us via Email</h4>
          <a href="#">siargaotravels@email.com</a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="info-item">
          <i class="fa fa-map-marker"></i>
          <h4>Visit Our Offices</h4>
          <a href="#">Del Carmen, Surigao del Norte</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="reservation-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form id="reservation-form" method="POST" action="{{ route('traveling.reservation.store', $city->id) }}"method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="username" class="Name" placeholder="Enter Name" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="Number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="Number" placeholder="Enter Phone Number" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="chooseGuests" class="form-label">Number Of Guests</label>
                <select name="num_guests" class="form-select" id="chooseGuests" onchange="updatePrice()">
                  <option selected>Select a Number</option>
                  @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </fieldset>
            </div>
            <div class="col-lg-6">
              <fieldset>
                <label for="Number" class="form-label">Check In Date</label>
                <input type="date" name="check_in_date" class="date" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <label for="chooseDestination" class="form-label">Choose Your Destination</label>
                <select name="destination_id" class="form-select" id="chooseDestination" onchange="updatePrice()">
                    <option selected>Select Destination</option>
                    @foreach($cities as $city) <!-- Loop through the cities -->
                        <option value="{{ $city->id }}" data-price="{{ $city->price }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <label for="totalPrice" class="form-label">Total Price</label>
                <input type="text" id="totalPrice" name="total_price" class="form-control" readonly>
              </fieldset>
            </div>
            <div class="col-lg-12">
              @if (isset(Auth::user()->id))
                <fieldset>
                  <label for="chooseDestination" class="form-label">User ID</label>
                  <input type="hidden" value="{{ Auth::check() ? Auth::user()->id : '' }}" name="user_ids" required>
                </fieldset>
              @endif
            </div>
            <div class="col-lg-12">
              <fieldset>
                @if (isset(Auth::user()->id))
                  <button type="submit" class="main-button">Make Your Reservation Now</button>
                @else
                  <p class="alert alert-warning">Please login first to make a booking</p>
                @endif
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function updatePrice() {
    const numGuests = document.querySelector('select[name="num_guests"]').value;
    const destinationSelect = document.getElementById('chooseDestination');
    const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
    const pricePerPerson = selectedOption.dataset.price || 0;
    const totalPrice = numGuests * pricePerPerson;

    document.getElementById('totalPrice').value = totalPrice ? `₱${totalPrice}` : ''; // Format as currency
  }
</script>
@endsection
