@extends('layouts.app')

@section('content')
<div class="container col-lg-4 bg-light p-3 rounded flex justify-center">
    
    <form action="{{route('login')}}" method="post">
        @csrf
        @if( session('status'))
            <div class="text-danger mb-3">
                {{ session('status') }}
            </div>
        @endif 
        <div class="mb-4">
            <label class="mb-1 visually-hidden" for="email" >Email</label>
            <input type="text" id="email" name="email" class="form-control
            @error('email') border-danger border-2 @enderror" placeholder="Enter your Email" value="{{old('email')}}"/>
            @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="mb-1 visually-hidden" for="password" >Password</label>
            <input type="password" id="password" name="password" class="form-control
            @error('password') border-danger border-2 @enderror" placeholder="Choose a password" value=""/>
            @error('password')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="remember" name="remember" >
            <label for="remember">Remember me</label>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn text-light bg-primary">Login</button>
        </div>
        
    </form>
</div>

@endsection