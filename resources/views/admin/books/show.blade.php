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
                {{-- <h2 class="card-text">{{ $book->Author->name . ' ' . $book->Author->last_name }}</h2> --}}
                <h2>{{ $book->title }}</h2>
            </div>
            <div class="card-body">
                <img src="{{ $book->image }}" alt="{{ $book->title }} image">

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
