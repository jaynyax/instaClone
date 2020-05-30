@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-8">
<img src="/storage/{{$post->image}}" alt="" width="350" height="400">
</div>
<div class="col-4">
<div class="row d-flex align-items-baseline">
<div>
<a href="/profile/{{$post->user->id}}">
<img src="/storage/{{$post->user->profiles->image}}" height="40px" width="40px" class="rounded-circle" alt="">
</a>
</div>
<div>
<h5 class="pl-3">{{$post->user->name}}</h5>
</div>
<div>
@cannot('update',$post->user->profiles)
<a href="/follow/{{$post->user->id}}" class="pl-3 font-weight-bold">{{$follows ? "unfollow" :"follow"}}</a>
@endcannot
</div>
</div>
<hr>
<p>{{$post->caption}}</p>
</div>

</div>


</div>

@endsection