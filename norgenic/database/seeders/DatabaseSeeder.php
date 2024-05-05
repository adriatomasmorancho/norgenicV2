<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        self::generateAuthors();
        $this->command->info('Authors table successfully created');
        self::generateBooks();
        $this->command->info('Books table successfully created');
    }

    private static function generateAuthors()
    {
        Author::factory(4)->create();
    }
    private static function generateBooks()
    {
        Book::factory(4)->create();
    }
}
