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
          <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a  href="{{ route('admins.create')}}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Admin Name</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($allAdmins as $admin)
                <tr>
                  <th scope="row">
                    {{ $admin->id }}
                  </th>
                  <td>{{ $admin->name }}</td>
                  <td>{{ $admin->email }}</td>
                </tr>  
              @endforeach

            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
@endsection