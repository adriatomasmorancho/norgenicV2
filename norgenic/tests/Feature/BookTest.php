<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    
    public function test_Book(): void
    {
        $this->createAuthor();

        $this->createBook();

        $response = $this->get('/bookstore/'.app()->getLocale().'/books');

        $response->assertSeeText('Book1');
    }

    public function test_DeleteBook(): void
    {
        $this->createAuthor();

        $this->createBook();

        $response = $this->get('/bookstore/'.app()->getLocale().'/books/remove/1');

        $response = $this->get('/bookstore/'.app()->getLocale().'/books');

        $response->assertDontSeeText('Book1');
    }

    public static function createAuthor()
    {
        $author = [
            'name' => 'Adria'
    ];
    
        $b = new Author();
        $b->name = $author['name'];
        $b->save();
    }

    public static function createBook()
    {
        $book = [
            'title' => 'Book1',
            'author_id' => '1'
    ];
    
        $b = new Book();
        $b->title = $book['title'];
        $b->author_id = $book['author_id'];
        $b->save();
    }
}
