@extends('layouts.user.master')

@section('title','Create User')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <!-- Show Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST" class="form-inline" id="myForm">
                @csrf    
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="******">
                </div>
                <div class="form-group mt-3">
                <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>    
</div>

@endsection

@push('addCss')
<style>
    .error{
        color:red;
    }
</style>
@endpush

@push('addJs')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
$("#myForm").validate({
  rules: {
    first_name: {
      required: true,
      minlength: 2
    },
    last_name: {
      required: true,
      minlength: 2
    },
    email: {
      required: true,
    },
  },
  messages: {
    first_name: {
      required: "Please enter your name",
      minlength: "Your name must be at least 2 characters long"
    },
    last_name: {
      required: "Please enter your name",
      minlength: "Your name must be at least 2 characters long"
    },
    email: {
      required: "Please enter email address",
    },
  }
});
</script>
@endpush