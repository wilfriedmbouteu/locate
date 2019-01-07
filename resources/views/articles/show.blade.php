@extends('master')

@section('content')

  <div class="row">
  	<div class="col-md-7">
  		<img src="uploads/avatars/{{ $post->user->avatar}} ">
      <h2>  {{ $post->title}} </h2>
  		<hr>
  		<br>
  		<p>{{ $post->body}} </p>
      <hr>
      <br>
       @foreach ($post->comment  as $comments)

        <p> {{ $comments->body }} &nbsp <strong> {{$comments->user->name }}| <img src="uploads/avatars/{{$comments->user->avatar }}" style="width:32px; height:32px; position:relative;    border-radius: 50% " alt="avatar" > {{ $comments->created_at->diffForHumans() }} </strong> </p>
       <br>
        @endforeach
      

      <form method="Post" action="/post/{{ $post->id }}/comment">
      	{{ csrf_field() }}
      	<div class="form-group">
      		<textarea id="body" name="body" class="form-control" placeholder="Comment here..."></textarea>
      	</div>
      	<button type="submit" class="btn btn-primary">Add Comment</button>
      </form>

  	</div>
  </div>

@endsection