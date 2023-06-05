@extends('layouts.admin')

@section('content')
    <div class="text-end">
        <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna alla lista dei progetti</a>
    </div>
    <h1 class="text-center mt-3">{{ $project->title }}</h1>
    <h6 class="text-end text-muted">{{ $project->slug }}</h6>
    <p class="text-center mt-4">{{ $project->description }}</p>
@endsection