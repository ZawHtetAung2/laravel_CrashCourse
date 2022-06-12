@extends('layouts.app')

@section('content')

<div class="container col-lg-5 bg-white p-3 rounded flex justify-center">

    <form action="{{route('posts')}}" method="post" class="mb-5">
        @csrf
        <div class="mb-4">
            <label for="body" class="mb-1 visually-hidden">Body</label>
            <textarea type="text" id="body" name="body" rows="4" class="bg-light rounded p-4 form-control @error('body') border-danger @enderror" placeholder="Post Somethings"></textarea>
            @error('body')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="">
            <button type="submit" class="btn text-light bg-primary">Post</button>
        </div>
    </form>

    @if($posts->count())
        @foreach($posts as $post)
            <x-post :post="$post"/>
        @endforeach
        {{ $posts->links() }}
    @else
        <p> {{ $user->name }} does not have any post.</p>
    @endif

</div>
@endsection