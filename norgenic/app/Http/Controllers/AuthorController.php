<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::showAuthors();
        return view('authors.authors',  compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $locale)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        try{
            Author::insertAuthors($request->input('name'));

            Session::flash('message', __('messageAuthorCreated'));
    
            return redirect()->route('authors.create', ['locale' => $locale]);
        
    } catch (Exception $e) {

        return redirect()->route('error.author', ['locale' => $locale]);
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
    public function edit(string $locale, string $id)
    {
        try{
        $author = Author::searchAuthors($id);
        if ($author === null) {
            return redirect()->route('error.generic', ['locale' => $locale]);
        }
        return view('authors.edit',  compact('author'));
        }catch (Exception $e) {
            return redirect()->route('error.generic', ['locale' => $locale]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $locale, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        try{
    
        Author::updateAuthors($request->input('name'), $id);

        Session::flash('message', __('messageAuthorEdited'));

        return redirect()->route('authors.edit', ['id' => $id, 'locale' => $locale]);
        }catch (Exception $e) {

            return redirect()->route('error.author', ['locale' => $locale]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, string $id)
    {
        try{
        Author::removeAuthors($id);

        Session::flash('message', __('messageAuthorDeleted'));

        return redirect()->route('authors', ['locale' => $locale]);
        }catch (Exception $e) {
            return redirect()->route('error.generic', ['locale' => $locale]);
        }
        
    }
}