@extends('layouts.kerdoiv')
@section('title', 'tanuloi kerdoivkitoltes' )
@section('content')
<h1></h1>

<div class="container-fluid p-1 bg-primary text-white text-center">
	<h3>{{ $kerdesszoveg }}</h3>
	<p>
		      
		nincs információm = 0;
		egyáltalán nem igaz = 1;
		többnyire nem igaz = 2;
		általában igaz = 3;
		teljesen igaz = 4
	</p>
	<div class="progress"style="height:20px" >
		<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{ ($kerdes/DB::table('kerdesek')->count())*100}}%" aria-valuemin="0" aria-valuemax="100">{{ ($kerdes/DB::table('kerdesek')->count())*100}}%</div>
	</div>
	</div>

<form method="POST" action="{{ url('/kerdoiv/' . $om . '/'.$kerdes) }}" accept-charset="UTF-8" style="display:inline">
	{!! csrf_field() !!}
	
<table class='table table-bordered table table-striped' style="margin-top:20px">
	<tr><th>Oktató neve</th><th>Értékelés</th></tr>
    @foreach ( $tanarok as $egytanar)
    	<tr><td>{{ $egytanar->pedagogus}} </td>
         	<td>
			<input type="radio" class="btn-check" name='{{ $egytanar->pedagogus}}' id={{ $egytanar->pedom}}0 autocomplete="off"  value=0 required>
			<label class="btn btn-info" for={{ $egytanar->pedom}}0>0</label>
			<input type="radio" class="btn-check" name='{{ $egytanar->pedagogus}}' id={{ $egytanar->pedom}}1 autocomplete="off" value=1>
			<label class="btn btn-info" for={{ $egytanar->pedom}}1>1</label>
			<input type="radio" class="btn-check" name='{{ $egytanar->pedagogus}}' id={{ $egytanar->pedom}}2 autocomplete="off" value=2>
			<label class="btn btn-info" for={{ $egytanar->pedom}}2>2</label>
			<input type="radio" class="btn-check" name='{{ $egytanar->pedagogus}}' id={{ $egytanar->pedom}}3 autocomplete="off" value=3>
			<label class="btn btn-info" for={{ $egytanar->pedom}}3>3</label>
			<input type="radio" class="btn-check" name='{{ $egytanar->pedagogus}}' id={{ $egytanar->pedom}}4 autocomplete="off" value=4>
			<label class="btn btn-info" for={{ $egytanar->pedom}}4>4</label>
			</td>
		</tr>
	@endforeach
</table>
<div class="d-grid">
<input type="submit" class="btn-primary "  value="Rögzít">
</div>
</form>
@endsection
