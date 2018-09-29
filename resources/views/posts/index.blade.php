@extends('layouts.master')
@section('content')
  <h1 class="p-2 mt-4">Recent Posts</h1>
  @if(count($posts)>0)
@foreach($posts as $post)
  <div class="card mt-4 mb-4 index-card">
    <div class="card-header">
    <a href="/posts/{{$post->id}}">{!!$post->title!!}</a>
    </div>


      @if ($post->cover_image)

  <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">

      @endif
      @if($post->body)

        <div class="card-body">
          {!!$post->body!!}
        </div>

    @endif

    <div class="card-footer text-muted">
      @if ($post->created_at)
  <small>Created At {{$post->created_at}} By @if($post->user)<a href="/profile/{{$post->user->id}}"> @endif {{$post->author}}</a> </small>
      @endif

 </div>

  </div>
@endforeach
{{$posts->links()}}
  @else
    <p> No Posts Found</p>
  @endif

@endsection
