@extends('layouts.felepitestanarok')
@section('title', 'koli tanári eredmenyek')

@section('content')
<h2 style="text-align:center">{{ $oktato}} értékelése</h2>
<div class="row justify-content-md-center">
    <div class="card col-lg-10" >
        <p style="text-align: center">
		      
            nincs információm = 0;
            egyáltalán nem igaz = 1;
            többnyire nem igaz = 2;
            általában igaz = 3;
            teljesen igaz = 4
        </p>
        <div class="card-body">
            <table class='table table-bordered table table-striped'>
                <thead>
                    <tr>
                        <th rowspan=2>Kérdés</th>
                        <th rowspan=2>Átlag</th>
                        <th colspan=5>Értékelés darabszáma</th>
                    </tr>
                    <tr>
                        <th>0</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @for($i=0;$i<17;$i++)
                        <tr>
                            <td>{{ $kerdesszovege[$i] ['kerdesszoveg']}}</td>
                            <td>{{ $kerdesekatlagnullanelkul[$i] }}</td>
                            @for($j=0;$j<5;$j++)
                                <td>{{ $kerdesek[$i][$j] }}</td>
                            @endfor
                        </tr>
                   
                    @endfor
               
                    <tr>
                        <th>Összesen</th>
                        <th>{{ $osszeskerdesatlaganullanelkul}}</th>
                        @for($i=0;$i<5;$i++)
                            <th>{{$ertekeles[$i]  }}</th>
                        @endfor
                        

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop