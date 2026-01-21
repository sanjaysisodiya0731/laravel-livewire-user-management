@extends('layouts.user.master')

@section('title','Login')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2>Login</h2>

            @if($errors->any())
                <div style="color: red;">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
        
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>    
@endsection