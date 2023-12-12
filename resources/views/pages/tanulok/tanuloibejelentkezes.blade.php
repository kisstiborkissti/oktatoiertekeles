@extends('layouts.kerdoiv')
@section('title', 'tanuloi bejelentkezes' )
@section('content')


<div class="row justify-content-md-center" style="margin-top:20px">
<div class="card col-lg-6" >
    <div class="card-header">Azonosításhoz szükséges adatok megadása</div>
    <div class="card-body">
        <p>
            Oktatóink értékelését csak a intézmény tanulói végezhetik el. Ennek biztosítására érdekében szűkségünk van a tanuló Oktatási azonosító számára és születési időpontjára.
            A kérdőivre adott válaszokat bizalmasan kezeljük, és a válaszok rögzítése közben semilyen személyes adatot nem tárolunk.
        </p>
        <form action="{{ url('tajekoztato') }}" method="post" name="tanulobejelentkezes"
        onSubmit="return validateForm()" >
        {!! csrf_field() !!}
        <div class="mb-3 mt-3">
            <label for="Om" class="form-label">Oktatási azonositó:</label>
            <input type="number" class="form-control" id="Om" placeholder="Oktatási azonosító" name="Om" required min=70000000000 max=79999999999>
        </div>
        <div class="mb-3">
            <label for="szulido" class="form-label">Születési idő:</label>
            <input type="date" max="2050-01-01" class="form-control" id="szulido" placeholder="Születési ido" name="szulido" required >
        </div>
        <div class="d-grid">
            <input type="submit" class="btn btn-info btn-block" value="Kérdőív kitöltésének megkezdése">
        </div>
               
        </form>
    
    </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
            // -------------- om --------------
        const tanuloom = document.getElementById("Om");
        tanuloom.addEventListener("input", function(event) {
            hiba=0;
            tanuloomszoveg=tanuloom.value.toString();
            if (tanuloom.validity.rangeOverflow || tanuloom.validity.rangeUnderflow) {
                tanuloom.setCustomValidity("A tanulóazonositó 7-tel kezdődik és 11 jegyű");
                tanuloom.reportValidity();
                hiba=1;
            } 
            //ellenőrző szám előállítása
	        osszeg=0;
	        for (i=0;i<11;i++){
		        osszeg=osszeg+tanuloomszoveg[i]*(i+1);
	        }
	        osszeg=osszeg%11;
            if (osszeg!=tanuloomszoveg[10])

	        {
                tanuloom.setCustomValidity("A tanulóazonositó nem megfelelő!!!");
                tanuloom.reportValidity();
                hiba=1;
            } 
            if (hiba==0)
            {
                tanuloom.setCustomValidity("");
            }
        });
        
        
    </script>
@endpush