<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        $books = Book::all();
        return view('admin.authors.index', compact('authors', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::where('author_id', null)->get();

        return view('admin.authors.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $data = $request->all();
        $new_author = new Author();
        $new_author->fill($data);
        $new_author->save();
        // $author_id = $new_author['id'];

        // $selectedBooks = $new_author['books']->pluck('id')->toArray();
        // dd($selectedBooks);

        return redirect()->route('admin.authors.index', $new_author)->with('message', "L'autore $new_author->name $new_author->last_name è stato creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = Book::all();

        return view('admin.authors.show', compact('author', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->all();

        $author->update($data);

        return redirect()->route('admin.authors.show', compact('author'))->with('message', "Hai modificato l'autore $author->name $author->last_name correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.authors.index', compact('author'))->with('message', "Hai eliminato l'autore $author->name $author->last_name correttamente");
    }
}
