@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Countries</h5>
    <form method="POST" action="{{ route('create.destinations')}}" enctype="multipart/form-data">
          <!-- Email input -->

          @csrf
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" />
          </div>  

          @if($errors->has('name'))
                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control" />
          </div>  

          @if($errors->has('image'))
                <p class="alert alert-success">{{ $errors->first('image') }}</p>
            @endif
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="Cities" id="form2Example1" class="form-control" placeholder="Cities" />
          </div> 
          @if($errors->has('cities'))
          <p class="alert alert-success">{{ $errors->first('cities') }}</p>
          @endif
           <div class="form-outline mb-4 mt-4">
            <input type="text" name="population" id="form2Example1" class="form-control" placeholder="Population" />

            @if($errors->has('population'))
            <p class="alert alert-success">{{ $errors->first('population') }}</p>
            @endif
          </div>  <div class="form-outline mb-4 mt-4">
            <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="Territory" />
          </div> 
          @if($errors->has('territory'))
          <p class="alert alert-success">{{ $errors->first('territory') }}</p>
          @endif
          
          <div class="form-floating">
            <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px"></textarea>
          </div>
          <br>
          @if($errors->has('description'))
          <p class="alert alert-success">{{ $errors->first('description') }}</p>
          @endif
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

    
        </form>

      </div>
    </div>
  </div>
</div>
@endsection