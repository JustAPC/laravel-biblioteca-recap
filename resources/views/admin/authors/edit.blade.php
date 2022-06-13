@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card text-center">
            <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <div class="pb-5">
                        <label for="name">Nome:</label>
                        <input type="text" class="card-text" id="name" name="name"
                            value="{{ $author->name }}"></input>
                    </div>

                    <div class="pb-5">
                        <label for="lastname">Cognome:</label>
                        <input type="text" class="card-text" id="lastname" name="last_name"
                            value="{{ $author->last_name }}"></input>
                    </div>

                    <div class="pb-5">
                        <label for="life_story">Storia:</label>
                        <textarea name="life_story" id="" cols="30" rows="10">{{ $author->life_story }}</textarea>
                    </div>

                    <div class="pb-5">
                        <label for="year">Anno di nascita:</label>
                        <input type="text" class="card-text" name="author_year" id="year"
                            value="{{ $author->author_year }}"></input>
                    </div>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-success fs-4">Save</button>
                </div>
            </form>

            {{-- <form action="{{ route('admin.books.destroy', $book->id) }}" class="d-inline-block ml-2" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
        </div>
    </div>
@endsection
