<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::All();

        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $genres = Genre::All();
        $authors = Author::All();

        return view('admin.books.create', compact('genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->All();

        $book = new Book();
        $book->fill($data);
        $book->save();

        if (!array_key_exists('genres', $data)) {
            $book->Genres()->detach();
        } else {
            $book->Genres()->sync($data['genres']);
        }

        return redirect()->route('admin.books.index')->with('message', "Hai creato il nuovo libro $book->title");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        $selectedGenres = $book->genres->pluck('id')->toArray();
        return view('admin.books.edit', compact('book', 'authors', 'genres', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->All();

        $book->update($data);

        if (!array_key_exists('genres', $data)) {
            $book->Genres()->detach();
        } else {
            $book->Genres()->sync($data['genres']);
        }

        return redirect()->route('admin.books.show', compact('book'))->with('message', "Hai modificato il libro $book->title correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('message', "il libro eliminato con successo è $book->title ");
    }
}
