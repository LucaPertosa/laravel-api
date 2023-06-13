@extends('layouts.admin')

@section('content')
    <h2 class="text-center">Modifica un nuovo progetto</h2>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-success my-3">Torna alla lista</a>
    
    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipologia</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type?->id)) value="{{$type->id}}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <label class="form-label">Tecnologia</label>
        <div class="mb-3 border rounded row px-3 mx-0">
            @foreach ($technologies as $technology)
            <div class="form-check col-md-4 my-3">
                <label for="{{$technology->name}}" class="form-check-label">{{ $technology->name }}</label>
                <input type="checkbox" @checked(old('technology_id') ? in_array($technology->id, old('technology_id', [])) : $project->technologies->contains($technology)) class="form-check-input @error('technology_id') is-invalid @enderror" name="technology_id[]" id="{{$technology->name}}" value="{{$technology->id}}">
                @error('technology_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @endforeach        
        </div>
        
        <div class="mb-3">
            <label for="image-input" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image-input" name="image">
            <div class="my-3 d-none" id="preview-container">
                <p>Anteprima immagine:</p>
                <img class="d-none w-25" id="image-preview" src="" alt="">
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{old('description', $project->description)}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Conferma modifiche</button>
    </form>
@endsection