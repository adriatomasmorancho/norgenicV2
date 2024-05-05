<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id'];

    public static function showBooks()
    {
        return  Book::select('books.*', 'books.id as book_id', 'authors.name as author')
        ->join("authors", "authors.id", "=", "books.author_id")->get();
    }

    public static function insertBooks($title, $author)
    {
        Book::create([
            'title' => $title,
            'author_id' => $author
        ]);
    }

    public static function searchBooks($id)
    {
        return  Book::where('id', $id)->first();
    }

    public static function updateBooks($title, $author, $id)
    {
        Book::where('id', $id)->update(['title' => $title, 'author_id' => $author]);
    }

    public static function removeBooks($id)
    {
        $affected = Book::where('id', $id)->delete();

    if ($affected === 0) {
        throw new \Exception();
    }
    }
}
