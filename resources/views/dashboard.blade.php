@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <h2 class="mt-4 text-center">Your Recent Posts</h2>
            <a href="/posts/create" class="btn btn-primary float-left cr-bt">Create A Post</a>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                          <table class="table">
                    @foreach ($posts as $post)


                        <th scope="row" class="table-active"><a href="/posts/{{$post->id}}">{!!$post->title!!}</a></th>
                        @if($post->cover_image)
                          <tr>
                            <td><img style="width:100%" src="storage/cover_images/{!!$post->cover_image!!}" alt=""></td>
                          </tr>
                        @endif
                        <tr>
                          <td>{!!$post->body!!}</td>
                        </tr>
                        <tr>
                          <td>
                      <small>{{$post->created_at}}</small>
                      {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                        {!!Form::hidden('_method', 'DELETE')!!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}</td></tr>
                        <tr><td><br></td></tr>
                    @endforeach
                          </table>
                    {{$posts->links()}}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
