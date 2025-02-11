@extends('layouts.app')

@section('content')
<div class="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      </div>
    </div>
  </div>
</div>


<div class="amazing-deals">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading text-center">
          <h2>Here are your Bookings!</h2>
        </div>
      </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Number of Guest(s)</th>
      <th scope="col">Check in Date</th>
      <th scope="col">Destination</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($bookings as $booking)
      <tr>
        <th scope="row">{{ $booking->id}}</th>
        <td>{{ $booking->username}}</td>
        <td>{{ $booking->phone_number}}</td>
        <td>{{ $booking->num_guests}}</td>
        <td>{{ $booking->check_in_date}}</td>
        <td>{{ $booking->destination}}</td>
        <td>{{ $booking->prices}}</td>
        <td>{{ $booking->status_ids}}</td>
      </tr>
    @endforeach

  </tbody>
</table>
@endsection