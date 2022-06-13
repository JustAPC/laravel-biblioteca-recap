@extends('layouts.app')

@section('content')
    <div class="container">


        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <a href=" {{ Route('admin.books.create') }} " class="btn btn-success mb-4">Crea</a>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Anno</th>
                    <th scope="col">Generi</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <th>{{ $book->id }}</th>
                        <td>
                            @if ($book->author_id != null)
                                <a
                                    href="{{ route('admin.authors.show', $book->Author->id) }}">{{ $book->Author->name . ' ' . $book->Author->last_name }}</a>
                            @else
                                Autore indefinito
                            @endif
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>
                            <img src="{{ $book->image }}" alt="{{ $book->title }}" width="80">
                        </td>
                        <td>{{ $book->creation_year }}</td>
                        <td>
                            @forelse ($book->Genres as $genre)
                                <span class="badge badge-pill badge-primary">{{ $genre->name }}</span>
                            @empty
                                Genere indefinito
                            @endforelse
                        </td>
                        <td>{{ $book->description }}</td>
                        <td class="d-flex">
                            <a href=" {{ Route('admin.books.show', $book->id) }} " class="btn btn-success mr-3">View</a>
                            <a href=" {{ Route('admin.books.edit', $book->id) }} " class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" class="d-inline-block ml-3"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h2>Non ci sono dati nella tabella</h2>
                @endforelse


            </tbody>
        </table>
    </div>
@endsection
