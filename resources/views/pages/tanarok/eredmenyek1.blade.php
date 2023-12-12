@extends('layouts.felepitestanarok')
@section('title', 'tanári eredmenyek')

@section('content')
<h1>Weboldal leirása</h1>
<div class="row justify-content-md-center">
    <div class="card col-lg-6" >
        <div class="card-header">Értékelések megoszlásai</div>
        <div class="card-body">
            <table class='table table-bordered table table-striped'>
                <tr><th>Értékelés</th><th>Értékelés darabszáma</th></tr>
                @for($i=0;$i<5;$i++)
                    <tr><td>{{$i}} értékelés </td><td>{{$ertekeles[$i]}} </td></tr>
                @endfor
                <tr><td>Összesen</td><td>{{ $osszertekeles}}</td></tr>
            </table>
        </div>
    </div>
</div>

<div id='diagramhely1' class="col-lg-12">
    
</div>
@section('d1hely', 'diagramhely1')

<div class="row justify-content-md-center">
    <div class="card col-lg-6" >
        <div class="card-header">Átlagpontszámok kérdésenként</div>
        <div class="card-body">
            <table class='table table-bordered table table-striped'>
                <tr><th>Kérdés</th><th>Kérdés darabszáma</th><th>Átlag 0 értékekkel</th><th>Átlag 0 értékek nélkül</th></tr>
                @for($i=0;$i<10;$i++)
                    <tr><td>{{$i+1}} kérdés </td><td>{{$kerdesek[$i]}} </td><td>{{$kerdesekatlagnullaval[$i]}} </td><td>{{$kerdesekatlagnullanelkul[$i]}} </td></tr>
                @endfor
                <tr><th>Összesen:</th><td>{{ $osszertekeles}}</td><th>{{ $osszeskerdesatlaganullaval }}</th><th>{{ $osszeskerdesatlaganullanelkul }}</th></tr>
            </table>
        </div>
    </div>
</div>

<div id='diagramhely2'></div>
@section('d2hely', 'diagramhely2')


@endsection
@push('scriptdiagramm')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">   
    var ertek=<?php echo json_encode($ertekeles)?>;
    var oktato=<?php echo json_encode($oktato)?>;
    var kerdesekszama=<?php echo json_encode($kerdesek)?>;
    var kerdesekatlagnullanelkul=<?php echo json_encode($kerdesekatlagnullanelkul)?>;
    var kerdesekatlagnullaval=<?php echo json_encode($kerdesekatlagnullaval)?>;
    Highcharts.chart(@yield('d1hely', ''), {
        chart: {
            type: 'column'
        },
        title: {
            text: oktato +' értékelése vagy jobb lennne valamilyen kördiagramm(pie)???'
        },
        subtitle: {
            text: ''
        },
         xAxis: {
            
            categories: [0,1,2,3,4]
        },
        yAxis: {
            title: {
                text: 'válaszok száma'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'darab',
            //data:[23,45,34,11]
            data: ertek
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});

    Highcharts.chart(@yield('d2hely', ''), {
        chart: {
            type: 'column'
        },
        title: {
            text: oktato,
        },
        subtitle: {
            text: ''
        },
         xAxis: {
            
            categories: [1,2,3,4,5,6,7,8,9,10]
        },
        yAxis: {
            title: {
                text: 'válaszok száma'
            }
            
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [
        {
            name: 'darab',
            color: 'rgba(186,60,61,.9)',
            //data:[23,45,34,11,8,7]
            data: kerdesekszama
        },
        {
            name: 'átlag nullák nélkul',
            color: 'rgba(0,211,0,.9)',
            
            data: kerdesekatlagnullanelkul
        },
        {
            name: 'átlag nullákkal',
            color: 'rgba(0,0,211,.9)',
            
            data: kerdesekatlagnullaval
        }
        ],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
   
</script>

@endpush