@extends('layouts.master')
@section('content')
  <a href="/posts" class="btn btn-secondary mt-4">Go Back</a>
  <div class="card m-4 show-card">
    <div class="card-header">{!!$post->title!!}</div>
    <div class="card-body">
      @if($post->cover_image)
      <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    @endif
      {!!$post->body!!}
    </div>
    <div class="card-footer text-muted">
  <small>Created At {{$post->created_at}} By {{$post->author}}</small>
 </div>
</div>
@if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id)
   {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ''])!!}
      <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
   {!!Form::hidden('_method', 'DELETE')!!}
   {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
   {!!Form::close()!!}
 @endif
 @endif
@endsection
