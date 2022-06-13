@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card text-center">
            <div class="card-header">
                <h2 class="card-text">{{ $book->Author->name . ' ' . $book->Author->last_name }}</h2>
                <h2>{{ $book->title }}</h2>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-around pb-4">
                    <img src="{{ $book->image }}" alt="{{ $book->title }} image" width="400px">
                    <div>
                        <p>Generi:</p>
                        @forelse ($book->Genres as $genre)
                            <span class="badge badge-pill badge-primary">{{ $genre->name }}</span>
                        @empty
                            Genere indefinito
                        @endforelse
                    </div>
                </div>
                <h4 class="card-text">Descrizione:</h4>
                <p class="card-text">{{ $book->description }}</p>
                <a href=" {{ Route('admin.books.edit', $book->id) }} " class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.books.destroy', $book->id) }}" class="d-inline-block ml-2" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
