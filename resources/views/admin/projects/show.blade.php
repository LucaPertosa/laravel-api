@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary" href="{{ url()->previous() }}">Torna indietro</a>
    </div>
    <h1 class="text-center mt-3">
        {{ $project->title }}
    </h1>
    
    {{-- aggiungo la visualizzazione dell'immagine solo se presente --}}
    @if ($project->image)
        <div class="mb-4 d-flex justify-content-center">
            <img class="img-fluid" src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->title }}">
        </div>
    @endif

    <h6 class="text-center">
        @forelse ($project->technologies as $tech)
            <span class="badge text-bg-info">{{ $tech->name }}</span>
        @empty
            <span class="badge text-bg-info">Nessuna technologia selezionata</span>
        @endforelse
    </h6>
    <div class="d-md-flex justify-content-between">
        @if ($project->type)
            <h6 class="text-muted">{{ $project->type->name }}</h6>
        @else
            <h6 class="text-muted">Nessuna tipologia assegnata</h6>
        @endif
        <h6 class="text-md-end text-muted">{{ $project->slug }}</h6>
    </div>
    <p class="text-center mt-4">{{ $project->description }}</p>
@endsection