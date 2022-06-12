@extends('layouts.app')

@section('content')

<div class="container col-lg-7 bg-white p-3 rounded flex justify-center">
    
    <form action="{{route('posts')}}" method="post" class="mb-4">
        @csrf
        <div class="mb-4">
            <label for="body" class="mb-1 visually-hidden">Body</label>
            <textarea type="text" id="body" name="body" rows="4"
            class="bg-light rounded p-4 form-control @error('body') border-danger @enderror" placeholder="Post Somethings"></textarea>
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
            <div class="mt-3">
                <a href="" class="fw-bold h5" style="text-decoration: none">{{ $post->user->name }}</a>
                <span class="text-muted">{{ $post->created_at->diffForHumans()}}</span>
                <p>{{ $post->body }}</p>
            </div>

            <form action="" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            <div class="d-flex me-2">
                @auth
                    @if(! $post->likedBy(auth()->user()))
                        <form action="{{ route('posts.likes', $post) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Like</button>
                        </form>
                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">Unlike</button>
                        </form>
                    @endif
                @endauth
                <span>{{ $post->likes->count()}} {{ Str::plural('like',$post->likes->count()) }}</span>
            </div>

            
        @endforeach
            {{ $posts->links() }}
        @else
        <p>There are no posts</p>
    @endif


</div>
@endsection