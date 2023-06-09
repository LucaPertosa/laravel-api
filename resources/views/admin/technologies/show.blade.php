@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary" href="{{ url()->previous() }}">Torna indietro</a>
    </div>
    <h1 class="text-center my-3">
        {{ $technology->name }}
    </h1>
    <p class="text-center w-50 mx-auto">{{ $technology->description }}</p>
@endsection