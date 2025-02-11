@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        @if(session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @endif

      @if(session()->has('delete'))
      <div class="alert alert-success">
        {{ session()->get('delete') }}
      </div>
    @endif
        <h5 class="card-title mb-4 d-inline">Cities</h5>
       <a  href="{{ route('create.destinations')}}" class="btn btn-primary mb-4 text-center float-right">Create Destinations</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">continent</th>
              <th scope="col">population</th>
              <th scope="col">territory</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($allDestinations as $destinations)
            <tr>
              <th scope="row">{{ $destinations->id }}</th>
              <td>{{ $destinations->name }}</td>
              <td>{{ $destinations->population }}</td>
              <td>{{ $destinations->territory }}</td>
              <td>{{ $destinations->avg_price }}</td>
              <td><a href="{{ route('delete.destinations', $destinations->id)}}" class="btn btn-danger  text-center ">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table> 
      </div>
    </div>
  </div>
</div>
@endsection