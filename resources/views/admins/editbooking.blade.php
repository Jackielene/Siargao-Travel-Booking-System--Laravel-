@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Bookings</h5>
        <p>Current Status: <b>{{ $reservation->status_ids }}</b></p>
        <form method="POST" action="{{ route('update.bookings', $reservation->id) }}" enctype="multipart/form-data">
          @csrf
          
          <div class="form-outline mb-4 mt-4">
            <select name="status_ids" class="form-select form-control" aria-label="Default select example">
              <option selected>Update Status</option>
              <option value="Processing">Processing</option>  
              <option value="Booked Successfully">Booked Successfully</option>        
            </select>
          </div>
          
          @if ($errors->has('status_ids'))
            <p class="alert alert-success">{{ $errors->first('status_ids') }}</p>
          @endif
          
          <br>

          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
