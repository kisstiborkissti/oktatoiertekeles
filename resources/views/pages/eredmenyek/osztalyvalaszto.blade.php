@extends('layouts.felepites1')
@section('title', 'osztályválasztó' )
@section('content')
<div class="row py-3" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Válaszd ki a keresendő osztályt
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('osztalyvalaszto') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="mb-3 mt-3">
                        <label for="osztaly" class="form-label">Osztály</label>
                        <select id="osztaly" name="osztaly">
                            @foreach ($adatok as $egyadat )
                                <option value="{{$egyadat->osztaly}}">{{$egyadat->osztaly}}</option>

                            @endforeach
                        </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn-primary " name="tipus" value="">Adatok megtekintése</button>
        </div>
                    </div>      
                </form>
                
            </div>
        </div>
    </div>
</div>


@endsection