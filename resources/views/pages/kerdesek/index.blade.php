@extends('layouts.felepites1')
@section('title', 'Fejlesztes alatt' )
@section('content')
    <div class="container-xxl py-5">
    
        <div class="row py-3" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Kérdések </h2>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered table table-striped border-collapse'>
                            <thead>
                                <tr>
                                    <th >Kérdés sorszáma</th>
                                    <th >Kérdés szövege</th>
                                    <th >Kérdés szerkesztése</th>
                                    <th >Kérdés törlése</th>
                                    <th > Továbbiak...</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($adatok as $egyadat)
                                    <tr>
                                        <td>{{ $egyadat->kerdes}}</td>
                                        <td >{{ $egyadat->kerdesszoveg }}</td>
                                        <td><a href="{{ url('kerdesek/'.$egyadat->kerdes.'/edit')}}"<i class="bi bi-pencil"></i></a></td>
                                        <td><i class="bi bi-trash"></i></td>
                                        
                                    </tr>
                               
                                @endforeach
                                    
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
@stop