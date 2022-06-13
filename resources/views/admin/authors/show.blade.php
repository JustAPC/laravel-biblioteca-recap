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
                <h2 class="card-text">{{ $author->name . ' ' . $author->last_name }}</h2>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $author->life_story }}</p>
                <p class="card-text">{{ $author->author_year }}</p>
                <div class="d-flex w-25 mx-auto justify-content-between">
                    <h4 class="card-text">Libri:</h4>
                    <div class="float-right">
                        @foreach ($books as $book)
                            @if ($author->id == $book->author_id)
                                <p>{{ $book->title }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <a href=" {{ Route('admin.authors.edit', $author->id) }} " class="btn btn-primary">Edit</a>
                {{-- <form action="{{ route('admin.books.destroy', $book->id) }}" class="d-inline-block ml-2" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
