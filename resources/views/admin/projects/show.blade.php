@extends('layouts.admin')

@section('content')
    <div class="text-end">
        <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna alla lista dei progetti</a>
    </div>
    <h1 class="text-center mt-3">{{ $project->title }}</h1>
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