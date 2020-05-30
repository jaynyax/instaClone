@extends('layouts.app')

@section('content')
<div class="container">
@foreach($posts as $post)
<div class="row">
<div class="col-8 offset-4" >
<a href="/profile/{{$post->user->id}}">
<img src="/storage/{{$post->image}}" alt="" width="350" height="400">

</a>
</div>
</div>
<div class="row">
<p class="col-8 offset-4 pt-3">{{$post->caption}}</p>
<hr/>
</div>
</div>


@endforeach
<div class="row col-12 d-flex justify-content-center">
{{$posts->links()}}
</div>

</div>

@endsection