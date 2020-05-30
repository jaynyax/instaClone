@extends('layouts.app')

@section('content')
<div class="container">
<div class="row" class="p-5">
    <div class="col-3">
    <img src="{{$users->profiles->profileImage()}}" alt="" height="100px" width="100px" class="rounded-circle" alt="ian">
   
    </div>
    <div class="col-9">
    <div class="d-flex justify-content-between align-items-baseline">
   <div class="d-flex mb-4">
   <div class="h2 ">{{$users->username}}</div>
   @cannot('update',$users->profiles)
   <example-component user-id = {{$users->id}} follows="{{$follows}}"></example-compoment>
   @endcannot
   </div>
   @can('update',$users->profiles)
   <a href="/p/create">Add Post</a>
   @endcan
    </div>
 @can('update',$users->profiles)
  <a href="/profile/{{$users->id}}/edit">Edit Profile</a>
 @endcan

   <div class="d-flex">
   <div class="pr-5">
   <strong>{{$postCount}}</strong>
   Posts
    </div>
    <div class="pr-5">
    <strong>{{$followersCount}}</strong>
    Followers
    </div>
    <div class="pr-5">
    <strong>{{$followingCount}} </strong>
    Following
    </div>
    </div>

    <div class="pt-4 font-weight-bold">{{$users->profiles->title}}</div>
    <div>{{$users->profiles->description}}</div>
    <div><a href="#">{{$users->profiles->url ?? 'N/A'}}</a></div>
   </div>
</div>

<div class="row pt-5">

@foreach($users->posts as $post)
<div class="col-4 pt-2">
<a href="/p/{{$post->id}}">
<img src="/storage/{{$post->image}}" alt="" height="200px" width="200">

</a>
</div>


@endforeach



</div>
</div>
@endsection
