@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary" href="{{ url()->previous() }}">Torna indietro</a>
    </div>
    <h2>Le Tecnologie usate nei progetti:</h2>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col" class="text-center">Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr class="">
                            <th scope="row">{{ $technology->id }}</th>
                            <td class="text-center">
                                {{ $technology->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection