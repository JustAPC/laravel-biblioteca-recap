@extends('layouts.app')

@section('content')
    <div class="container">


        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <a href=" {{ Route('admin.authors.create') }} " class="btn btn-success mb-4">Crea Autore</a>

        <table class="table table-dark">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Storia di vita</th>
                    <th scope="col">Data di nascita</th>
                    <th scope="col">Libri scritti</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                    <tr>
                        <th>{{ $author->id }}</th>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->last_name }}</td>
                        <td class="col-2">{{ $author->life_story }}</td>
                        <td>{{ $author->author_year }}</td>
                        <td>
                            @foreach ($books as $book)
                                @if ($author->id == $book->author_id)
                                    <p class="text-capitalize">{{ $book->title }}</p>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.authors.show', $author->id) }}" class="btn btn-success">View</a>
                            <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.authors.destroy', $author->id) }}" class="d-inline-block"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @empty
                        <h2>Non ci sono dati nella tabella</h2>
                @endforelse


            </tbody>
        </table>
    </div>
@endsection
