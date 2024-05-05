<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeAppLocaleTo(Request $request)
{
    $language = $request->input('language');

    App::setLocale($language);

    Session::put('locale', $language);

    return redirect()->back();
}
}