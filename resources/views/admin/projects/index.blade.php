@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <h1 class="text-center">Lista dei progetti</h1>
    
        <div class="my-3 text-end">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Aggiungi un nuovo progetto
            </a>
        </div>

    {{-- Gesione filtri --}}
    <div class="col-6 mx-auto border rounded my-3">
        <form action="{{ route('admin.projects.index') }}" method="get" class="my-3 px-3">
            @csrf
            <label for="technology" class="form-label">Filtra per tecnologia</label>
            <select name="technology_id" id="technology" class="form-select">
                <option value="">Tutti</option>
                @foreach ($technologies as $tech)
                    <option value="{{$tech->id}}">{{ $tech->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary my-3">Applica filtro</button>
        </form>
    </div>

    @if ($projects->count() > 0)
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->type?->name ? $project->type?->name : 'non assegnata' }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="{{route('admin.projects.edit', $project->slug)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ms_btn_cancel" data-title="{{$project->title}}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <h2 class="text-center my-3">Nessun progetto associato con questi filtri: {{$selected_tech}}</h2>
    @endif
@endsection