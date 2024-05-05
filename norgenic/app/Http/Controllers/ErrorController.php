<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function viewGenericError()
    {
        return view('errors.genericError');
    }

    public function viewAuthorError()
    {
        return view('errors.authorError');
    }

    public function viewBookError()
    {
        return view('errors.bookError');
    }
}