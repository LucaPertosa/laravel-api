@extends('layouts.admin')

@section('content')
    <div class="card border-0" style="z-index: -1">
        <div class="card-body">
            <h1 class="card-title text-center">Il mio Portfolio - Dashboard</h1>
            <h2 class="card-subtitle text-center text-muted mt-4">Chi sono: {{Auth::user()->name}}</h2>
            <p class="card-text text-center mt-4">
                Qui ci metto la mia descrizione
            </p>
        </div>
        <img src="..." class="card-img-bottom" alt="immagine di prova">
    </div>
@endsection