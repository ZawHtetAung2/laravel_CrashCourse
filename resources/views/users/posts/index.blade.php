@extends('layouts.app')

@section('content')
<div class="container col-lg-5 bg-white p-3 rounded flex justify-center">

    <div class="text-light bg-secondary p-2 rounded mb-5">
        <h1 class="font-medium ms-3">{{$user->name}}</h1>
        <p class="font-medium ms-3">Posted {{$posts->count() }} {{ Str::plural('post',$posts)}}
            and received {{ $user->receivedLikes->count() }} likes.</p>
    </div>

    <div>
        @if($posts->count())
        @foreach($posts as $post)
        <x-post :post="$post" />
        @endforeach
        <!-- {{ $posts->links() }} -->
        @else
        <p> {{ $user->name }} does not have any post.</p>
        @endif
    </div>

</div>
@endsection