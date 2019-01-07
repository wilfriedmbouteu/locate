@extends('master')

@section('content')
<div class="row">
	<div class="col-md-6">
		<h2>Create a Post</h2>
		<hr>
		<br>
    <form method="Post" action="/post">
    	{{csrf_field() }}
    	<div class="form-group">
    		<label for="title">
    			Title :
    		</label>
    		<input type="text" class="form-control" name="title" id="title" placeholder="title">
    	</div>

    	<div class="form-group">
    		<textarea class="form-control" name="body" id="body" placeholder="Enter your post here..."></textarea>
    		</div>
    		<button class="btn btn-primary" type="submit">Publish</button>

            @include('partials.errors')
    </form>

	</div>

</div>


@endsection