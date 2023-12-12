@extends('layouts.felepites1')
@section('title', 'Hibas adatok' )
@section('content')
<div class="row justify-content-md-center text-danger ">
    <div class="card col-lg-6" >
        <div class="card-header ">Hozzáférési hiba!!!</div>
        <div class="card-body " >
                <p>Tisztelt Látogató!</p>
                <p>A megadott adatok alapján nem jogosult a kérdőiv kitöltésére.</p>
                <p>Ha valóban iskolánk tanulója próbáljon meg bejelentkezni ismételten, de fokozottan figyeljen a megadott adatok helyességére. Ha a probléma ismételten jelentkezik keresse meg osztályfőnökét, vagy a vegye fel a kapcsolatot intézményünkkel. </p>
                <p>Az esetleges kellemetlenségekért elnézét kérjük!</p>
            </div>
    </div>
</div>  
@endsection