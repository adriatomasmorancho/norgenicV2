<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   use RefreshDatabase; 

    public function test_Author(): void
    {
        $this->createAuthor();

        $response = $this->get('/bookstore/'.app()->getLocale().'/authors');

        $response->assertSeeText('Adria');
    }

    public function test_DeleteAuthor(): void
    {
        $this->createAuthor();

        $response = $this->get('/bookstore/'.app()->getLocale().'/authors/remove/1');

        $response = $this->get('/bookstore/'.app()->getLocale().'/authors');

        $response->assertDontSeeText('Adria');
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
}