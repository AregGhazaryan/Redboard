@extends('layouts.master')
@section('content')
  <h1>Your Profile</h1>
  <div class="card">
    <div class="row">
      <div class="col">
  <img src="/storage/profile_images/{{$info->profile_img}}" alt="profile_img" class='profile-img'>
      </div>
      <div class="col">
        <table class="table">
<tr>
  <td class="">Name:</td>
  <td class="col">{{$info->name}}</td>
</tr>
<tr>
  <td class="">Birthday:</td>
  <td class="col">@if(!$info->birthday) Unspecified @endif{{$info->birthday}}</td>
</tr>
<tr>
  <td class="">Gender:</td>
  <td class="col">@if(!$info->sex) Unspecified @endif{{$info->sex}}</td>
</tr>
<tr>
  <td class="">Country:</td>
  <td class="col">@if(!$info->country) Unspecified @endif{{$info->country}}</td>
</tr>

        </table>
        @if(Auth::user()->id == $info->id)
          <a href="/profile/{{$info->id}}/edit" class="btn btn-primary">Edit</a>
        @endif
      </div>

    </div>

  </div>

@endsection
