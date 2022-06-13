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
                <div class="pb-5">
                    <label for="name">Nome:</label>
                    <input type="text" class="card-text" id="name" value="{{ $author->name }}"></input>
                </div>

                <div class="pb-5">
                    <label for="lastname">Cognome:</label>
                    <input type="text" class="card-text" id="lastname" value="{{ $author->last_name }}"></input>
                </div>

                <div class="pb-5">
                    <label for="story">Storia:</label>
                    <textarea name="story" id="" cols="30" rows="10">{{ $author->life_story }}</textarea>
                </div>

                <div class="pb-5">
                    <label for="year">Anno di nascita:</label>
                    <input type="text" class="card-text" id="year" value="{{ $author->author_year }}"></input>
                </div>
            </div>
            <div class="card-body">

                <a href=" {{ Route('admin.authors.update', $author->id) }} " class="btn btn-success">Save</a>
                {{-- <form action="{{ route('admin.books.destroy', $book->id) }}" class="d-inline-block ml-2" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
