@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">

        @if(session()->has('update'))
        <div class="alert alert-success">
          {{ session()->get('update') }}
        </div>
        @endif
        <h5 class="card-title mb-4 d-inline">Bookings</h5>
      
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">phone_number</th>
              <th scope="col">num_guests</th>
              <th scope="col">check_in_date</th>
              <th scope="col">destination</th>
              <th scope="col">prices</th>
              <th scope="col">status_ids</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservations )
            <tr>
              <th scope="row">{{ $reservations->id }}</th>
              <td>{{ $reservations->username }}</td>
              <td>{{ $reservations->phone_number }}</td>
              <td>{{ $reservations->num_guests }}</td>
              <td>{{ $reservations->check_in_date }}</td>
              <td>{{ $reservations->destination }}</td>
              <td>{{ $reservations->prices }}</td>
              <td>{{ $reservations->status_ids }}</td>
               <td><a href="{{ route('edit.bookings', $reservations->id )}}" class="btn btn-danger  text-center ">Update</a></td>
            </tr>
            @endforeach

          </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>
@endsection