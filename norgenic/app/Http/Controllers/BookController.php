<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::showBooks();
        return view('books.books',  compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::showAuthors();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required',
        ], [
            'author.required' => __('authorRequired'),
        ]);

        try{

        Book::insertBooks($request->input('title'),$request->input('author'));

        Session::flash('message', __('messageBookCreated'));

        return redirect()->route('books.create');

        }catch (Exception $e) {

            return redirect()->route('error.book');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
        $book = Book::searchBooks($id);

        if ($book === null) {
            return redirect()->route('error.generic');
        }

        $authors = Author::showAuthors();

        return view('books.edit',  compact('book', 'authors'));
        }catch (Exception $e) {

            return redirect()->route('error.generic');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required',
        ], [
            'author.required' => __('authorRequired'),
        ]);

        try{
    
        Book::updateBooks($request->input('title'),$request->input('author'), $id);

        Session::flash('message', __('messageBookEdited'));

        return redirect()->route('books.edit', ['id' => $id]);

        }catch (Exception $e) {

            return redirect()->route('error.book');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Book::removeBooks($id);
            Session::flash('message', __('messageBookDeleted'));
            return redirect()->route('books');
        } catch (Exception $e) {
            return redirect()->route('error.generic');
        }
    }
}