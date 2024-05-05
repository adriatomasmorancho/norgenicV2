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

    if($language == "es"){
        $url = $request->headers->get('referer');

        $url = str_replace('en', 'es', $url);

    }else{
        $url = $request->headers->get('referer');

        $url = str_replace('es', 'en', $url);
    }

    App::setLocale($language);

    Session::put('locale', $language);

    return redirect()->to($url);
}
}