@extends('layouts.admin')
@section('content')
    <h2 class="text-center">Aggiungi un nuovo progetto</h2>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-success my-3">Torna alla lista</a>
    
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Titolo</label>
            <select class="form-select" name="type_id" id="type">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{$type->id}}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{old('description')}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Crea</button>
    </form>
@endsection