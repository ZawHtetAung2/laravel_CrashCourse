@props(['post'=>$post])

<!-- Username & Delete -->
<div class="d-flex justify-content-between">
    <div>
        <a href="{{ route('users.posts', $post->user) }}" class="fw-bold h5" style="text-decoration: none">{{ $post->user->name }}</a>
        <span class="text-muted ms-2">{{ $post->created_at->diffForHumans()}}</span>
        <p>{{ $post->body }}</p>
    </div>

    @can('delete',$post)
    <form action="{{ route('posts.destroy', $post) }}" class="ms-5" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    @endcan
</div>

<!-- Like/Unlike -->
<div class="d-flex mb-4">
    @auth
    @if(! $post->likedBy(auth()->user()))
    <form action="{{ route('posts.likes', $post) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary me-2">Like</button>
    </form>
    @else
    <form action="{{ route('posts.likes', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-secondary me-2">Unlike</button>
    </form>
    @endif
    @endauth
    <span class="text-secondary">{{ $post->likes->count()}} {{ Str::plural('like',$post->likes->count()) }}</span>
</div>
<hr>