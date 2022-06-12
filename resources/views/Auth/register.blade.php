@extends('layouts.app')

@section('content')
<div class="container col-lg-4 bg-light p-3 rounded flex justify-center">
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="mb-4">
            <label class="sr-only mb-1 visually-hidden" for="name">Your Name</label>
            <input type="text" id="name" name="name" class="form-control 
            @error('name') border-danger border-2 @enderror" placeholder="Enter your Name" value="{{old('name')}}"/>
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="sr-only mb-1 visually-hidden" for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control
            @error('username') border-danger border-2 @enderror" placeholder="Enter your Username" value="{{old('username')}}"/>
            @error('username')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="sr-only mb-1 visually-hidden" for="email" >Email</label>
            <input type="text" id="email" name="email" class="form-control
            @error('email') border-danger border-2 @enderror" placeholder="Enter your Email" value="{{old('email')}}"/>
            @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="sr-only mb-1 visually-hidden" for="password" >Password</label>
            <input type="password" id="password" name="password" class="form-control
            @error('password') border-danger border-2 @enderror" placeholder="Choose a password" value=""/>
            @error('password')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="sr-only mb-1 visually-hidden" for="password_confirmation" >Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
             class="form-control" placeholder="Repeat your password" value=""/>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn text-light bg-primary">Register</button>
        </div>
        
    </form>
</div>

@endsection