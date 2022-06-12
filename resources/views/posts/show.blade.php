@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="container bg-white p-3 rounded ">
            <x-post :post="$post"/>
        </div>
    </div>
@endsection