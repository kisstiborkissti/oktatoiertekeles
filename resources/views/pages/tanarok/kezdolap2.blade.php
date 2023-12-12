
@extends('layouts.felepitestanarok')
@section('title', 'tanári bejelentkezes')
@section('content')
<h1></h1>

<div class="row justify-content-md-center">
<div class="card col-lg-6" >
    <div class="card-header">Tanár azonosításhoz szükséges adatok megadása</div>
    <div class="card-body">
        
        <form action="{{ url('tanarok/adatok2') }}" method="post">
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
            <button type="submit" class="btn-primary " name="tipus" value="WEB">Adatok megtekintése</button>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn-primary " name="tipus" value="PDF">PDF</button>
        </div>
        
         
        </form>
        <form action="{{ url('tanarok/adatokkoli') }}" method="post">
            {!! csrf_field() !!}
            <div class="mb-3 mt-3">
                <label for="tnev" class="form-label">Kolégiumi tanár neve</label>
                <select id="tnev" name="tnev">
                    <option value="Bánhalmi Imréné">Bánhalmi Imréné</option>
                    <option value="Bródi Viktor">Bródi Viktor</option>
                    <option value="Lengyel Zoltán">Lengyel Zoltán</option>
                    <option value="Tarné Horváth Szilvia">Tarné Horváth Szilvia</option>
                    <option value="Vass Ildikó">Vass Ildikó</option>
                    <option value="Vékony Szilárd István">Vékony Szilárd István</option>
                   
                </select>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn-primary " >Adatok megtekintése</button>
            </div>
             
            </form>
    </div>
    </div>
</div>
@endsection