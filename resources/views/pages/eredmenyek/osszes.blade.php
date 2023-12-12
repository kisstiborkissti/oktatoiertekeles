@extends('layouts.felepites1')
@section('title', 'eredmenyek' )
@section('content')
<div class="row py-3" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Kitöltési állapot
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanuló nevet</th>
                          <th scope="col">Oktatási azonosító</th>
                          <th scope="col">Utoljára kitöltött kérdés</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $adatok as $egyadat)
                        <tr>
                          <th scope="row">{{ $loop->iteration+($adatok->currentPage()-1)*15 }}</th>
                          <td>{{ $egyadat->nev }}</td>
                          <td>{{ $egyadat->oktatasiazonosito }}</td>
                          <td>{{ $egyadat->kerdes }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{--! pagináte vezérlőlinkje next és prew van--}}
                {{ $adatok->links() }}
                
                {{-- Pagináte vezérlőlinkre oldalszámmal +-5 elemmel 
                {{ $adatok->onEachSide(5)->links()}} --}}
                

                
            </div>
        </div>
    </div>
</div>


@endsection