@extends('layouts.felepitestanarok')

@section('title', 'tanári eredmenyek')

@section('content')
<h2 style="text-align:center">{{ $oktato}} értékelése</h2>
<div class="row justify-content-md-center">
    <div class="card col-xl-12" >
        <p style="text-align: center">
            nincs információm = 0;
            egyáltalán nem igaz = 1;
            többnyire nem igaz = 2;
            általában igaz = 3;
            teljesen igaz = 4            
        </p>
        <div class="card-body">
            <table class='table table-bordered table table-striped border-collapse'>
                <thead>
                    <tr>
                        <th rowspan=2>Kérdés</th>
                        <th rowspan=2 class="pdfkozep">Átlag</th>
                        <th colspan=5 class="pdfkozep" >Válaszok (db)</th>
                    </tr>
                    <tr>
                        <th class="pdfkozep">0</th>
                        <th class="pdfkozep">1</th>
                        <th class="pdfkozep">2</th>
                        <th class="pdfkozep">3</th>
                        <th class="pdfkozep">4</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @for($i=0;$i<10;$i++)
                        <tr>
                            <td>{{ $kerdesszovege[$i] ['kerdesszoveg']}}</td>
                            <td class="pdfkozep">{{ $kerdesekatlagnullanelkul[$i] }}</td>
                            @for($j=0;$j<5;$j++)
                                <td class="pdfkozep" >{{ $kerdesek[$i][$j] }}</td>
                            @endfor
                        </tr>
                   
                    @endfor
               
                    <tr>
                        <th>Összesen</th>
                        <th class="pdfkozep">{{ $osszeskerdesatlaganullanelkul}}</th>
                        @for($i=0;$i<5;$i++)
                            <th class="pdfkozep" >{{$ertekeles[$i]  }}</th>
                        @endfor
                        

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@stop