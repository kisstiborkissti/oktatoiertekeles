@extends('layouts.kerdoiv')
@section('title', 'tanuloi tájékoztató')
@section('content')
<div class="row justify-content-md-center">
    <div class="card col-lg-6" >
        <div class="card-header">Tanulói tájékoztató</div>
        <div class="card-body">
                <h1>Köszönjük, hogy a kérdőív kitöltésével segíti munkánkat!</h1>
                <p>
                    Kérjük, gondold végig és értékeld, hogy a felsorolt állítások közül melyik milyen mértékben igaz.
                </p>
                <p>Válaszd ki a véleményedet tükröző értéket  0 és 4 között, ahol:
                <ul>
                    <li>nincs információm = 0 </li>
                    <li>egyáltalán nem igaz = 1 </li>
                    <li>többnyire nem igaz = 2 </li>
                    <li>általában igaz = 3</li>
                    <li>teljesen igaz = 4.</li>
                </ul>
                </p>
                <p>A „0” megjelölést az átlagba nem számítjuk bele!</p>
                <p>Pontos válaszaid segítenek abban, hogy oktatód munkájára vonatkozóan a véleményedet megismerjük. </p>
                <h1>Segítő közreműködésedet köszönjük!</h1>
        </div>
        <div class="d-grid">
            <a href="{{ url('/kolikerdoiv/' . $om . '/'.$kerdes) }}"> 
                <input type="button" class="btn btn-info btn-block col-lg-12 " value="Kérdőív kitöltése">
            </a>
            <!--    
            <button class="btn-primary "><a href="{{ url('/kerdoiv/' . $om . '/'.$kerdes) }}" title="Kérdőiv "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Kérdőiv kitöltése</a></button>
            -->
        </div>
    </div>
    
</div>  
@endsection
