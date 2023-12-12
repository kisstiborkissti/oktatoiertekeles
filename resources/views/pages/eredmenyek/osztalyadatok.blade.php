@extends('layouts.felepites1')
@section('title', 'eredmenyek' )
@section('content')
<div class="row py-3" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Kitöltési állapot az {{ $adatok[0]->osztaly }} osztályban
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanuló neve</th>
                          <th scope="col">Oktatási azonosító</th>
                          <th scope="col">Utoljára kitöltött kérdés</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $adatok as $egyadat)
                        @if ($egyadat->kerdes==$kerdesekszama=DB::table('kerdesek')->count())
                            <tr class="table-success">
                        @else
                            <tr class="table-danger">
                        @endif  
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $egyadat->nev }}</td>
                        <td>{{ $egyadat->oktatasiazonosito }}</td>
                        <td>{{ $egyadat->kerdes}} 
                            <div class="progress"style="height:20px" >
                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{ ($egyadat->kerdes/$kerdesekszama)*100}}%" aria-valuemin="0" aria-valuemax="100">{{ ($egyadat->kerdes/$kerdesekszama)*100}}%</div>
                            </div>
                        
                        
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                

                
            </div>
        </div>
    </div>
</div>


@endsection