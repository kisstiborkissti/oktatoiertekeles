
@extends('layouts.felepitestanarok')
@section('title', 'tanári bejelentkezes')
@section('content')
<h1></h1>

<div class="row justify-content-md-center">
<div class="card col-lg-6" >
    <div class="card-header">Tanár azonosításhoz szükséges adatok megadása</div>
    <div class="card-body">
        
        <form action="{{ url('tanarok/adatok3') }}" method="post">
        {!! csrf_field() !!}
        <div class="mb-3 mt-3">
            <label for="tnev" class="form-label">Tanár neve</label>
            <select id="tnev" name="tnev">
                @foreach ($adatok as $egyadat)
                <option value="{{ $egyadat->nev}}">{{ $egyadat->nev}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn-primary " name="tipus" value="">Eredmények grafikus megtekintése</button>
        </div>
        
    </div>
    </div>
</div>
@endsection