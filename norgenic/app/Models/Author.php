<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function showAuthors()
    {
        return  Author::all();
    }

    public static function insertAuthors($name)
    {
        Author::create([
            'name' => $name
        ]);
    }

    public static function searchAuthors($id)
    {
        return  Author::where('id', $id)->first();
    }

    public static function updateAuthors($name, $id)
    {
        Author::where('id', $id)->update(['name' => $name]);
    }

    public static function removeAuthors($id)
    {
        $affected = Author::where('id', $id)->delete();

        if ($affected === 0) {
            throw new \Exception();
        }
    }

}
