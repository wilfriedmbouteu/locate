@extends('master')


@section('content')
<div class="container">
	<h2>Front Map</h2>
	<br>
	<div id="map">
		
	</div>
	{!! Form::open([ 'url' => '/getLocationCoords', 'id'=> 'searchGirls']) !!}
     <br>
     <div class="form-group">
      {!! Form::label('district', 'District') !!}
    
     
     {!! Form::select('district', $districts, null, ['id' => 'district' ] ); !!}
      	
      
      </div>
      <div id="city">
      	
      </div>

     {!! Form::submit('Find', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
<h4>Girl's List</h4>
<hr>
<ul id="girlsResult">
	
</ul>

</div>


@endsection