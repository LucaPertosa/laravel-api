@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <a class="btn btn-primary" href="{{ url()->previous() }}">Torna indietro</a>
    </div>
    <h2 class="mb-3 text-center">Le Tecnologie usate nei progetti:</h2>
    <div class="row">
        <div class="col-6 mx-auto border rounded">
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col">id</th>
                        <th scope="col" class="text-center">Nome</th>
                        <th scope="col" class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr class="col-6">
                            <th scope="row">{{ $technology->id }}</th>
                            <td class="text-center">
                                {{ $technology->name }}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection