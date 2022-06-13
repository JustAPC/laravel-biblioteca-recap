@extends('layouts.app')

@section('content')
    <div class="container">
        <form action=" {{ route('admin.authors.store') }} " method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
            </div>

            <div class="form-group">
                <label for="life_story">Life Story</label>
                <textarea name="life_story" id="life_story" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="author_year">Year of birth</label>
                <input type="number" class="form-control" id="author_year" name="author_year">
            </div>

            {{-- <div class="form-group">
                <p class="pt-5 text-danger">Libri:</p>
                @foreach ($books as $book)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="book-{{ $book->id }}"
                            value="{{ $book->id }}" name="books[]" @if (in_array($book->id, old('books', []))) checked @endif>
                        <label for="book-{{ $book->id }}" class="form-check-label">{{ $book->title }}</label>
                    </div>
                @endforeach
            </div> --}}

            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
