@extends('layouts.app')

@section('content')
<div class="container">


<form action="/p" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
<h1>Add Post</h1>
</div>
<div class="row">

<div class="col-8 offset-3">

<div class="form-group row">
<label for="caption" class="col-md-4 col-form-label">Post Caption</label>


    <input id="caption" type="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption">

    @error('caption')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>

<div class="form-group row">
<label for="image" class="col-md-4 col-form-label">Post image</label>


    <input id="image" type="file" class="form-control-file" name="image" >

    @error('image')
      
            <strong>{{ $message }}</strong>
    
    @enderror

</div>

<div class="row pt-4">
<button class="btn btn-primary ">Add New Post</button>
</div>



</div>

</div>
</form>


</div>
@endsection
