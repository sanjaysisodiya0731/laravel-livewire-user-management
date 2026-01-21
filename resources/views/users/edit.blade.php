@extends('layouts.user.master')

@section('title','Create User')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <!-- Add Back Button -->
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            <h2>Edit User</h2>
            <form action="{{ route('users.update',$user->id) }}" method="POST" class="form-inline" id="myForm">
                @csrf    
            <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{ $user->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="First Name" value="{{ $user->last_name }}">
                </div>
                <div class="form-group mt-3">
                <input type="submit" value="Update" class="btn btn-primary">
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
  }
});
</script>
@endpush