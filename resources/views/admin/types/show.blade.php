@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary" href="{{ url()->previous() }}">Torna indietro</a>
    </div>
    <h1 class="text-center mt-3">{{ $type->name }}</h1>
    
    <h6 class="text-md-end text-muted">{{ $type->slug }}</h6>
    
    <h3 class="mb-3">Progetti collegati a questa tipologia di programmazione:</h3>
    <ul>
        @forelse ($type->projects as $project)
            <li class="mb-3">
                <a href="{{ route('admin.projects.show', $project->slug) }}">
                    {{ $project->title }}
                </a>
            </li>
        @empty
            <li>Nessun progetto collegato a questa tipologia</li>
        @endforelse
    </ul>
@endsection