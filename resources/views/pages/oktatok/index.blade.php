<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Import Export Excel to Database Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 10 Import Export Excel to Database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ route('kulsoadatok.import') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <label for="adatkategoria">Kérem válassza ki mit szeretne importálni</label>
                <select id="adatkategoria" name="adatkategoria">
                    <option value=""></option>
                    <option value="tanulok">Tanulok adatai</option>
                    <option value="oktatok">Oktatók adatai</option>
                    <option value="osszerendeles">Tanuló tantárgy összerendelés</option>
                
                </select>
                
                <input type="file" name="file" class="form-control">
                <br>
                <input type="submit" class="btn-primary "  value="Adatok importálása">
               
            </form>
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        Oktatok listája
                        //ide jöhetne az export gomb
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach($adatok as $egyadat)
                <tr>
                    <td>{{ $egyadat->id }}</td>
                    <td>{{ $egyadat->nev }}</td>
                    <td>{{ $egyadat->szulhely }}</td>
                </tr>
                @endforeach
            </table>
  
        </div>
    </div>
</div>
     
</body>
</html>