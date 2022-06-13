@extends('layouts.app')

@section('content')
    <div class="container">
        <form action=" {{ route('admin.books.update', $book->id) }} " method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="url" class="form-control" id="image" name="image"
                    placeholder="https://via.placeholder.com/640x480.png/00ffcc?text=vero"
                    value="{{ old('image', $book->image) }}">
            </div>

            <div class="form-group">
                <label for="creation_year">creation_year</label>
                <input type="text" class="form-control" id="creation_year" name="creation_year"
                    value="{{ old('creation_year', $book->creation_year) }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">
                {{ old('description', $book->description) }}
            </textarea>
                <div class="float-right">
                    <label for="author">Autore:</label>
                    <select name="author_id" id="author">
                        <option value="">Seleziona un Autore...</option>
                        @foreach ($authors as $author)
                            <option @if (old('author_id', $book->author_id) == $author->id) selected @endif value=" {{ $author->id }} ">
                                {{ $author->name . ' ' . $author->last_name }}</option>
                        @endforeach
                    </select>

                    <p class="pt-5">Genres:</p>
                    @foreach ($genres as $genre)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{ $genre->name }}-genre"
                                value="{{ $genre->id }}" name="genres[]"
                                @if (in_array($genre->id, old('genres', $selectedGenres))) checked @endif>
                            <label for="{{ $genre->name }}-genre" class="form-check-label">{{ $genre->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection
