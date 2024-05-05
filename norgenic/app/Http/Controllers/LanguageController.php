<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{
    public function changeAppLocaleTo(Request $request)
    {
        $envFile = base_path('.env');

        $contents = File::get($envFile);

        if($request->input('language') == "es"){

            $contents = preg_replace('/^APP_LOCALE=.*/m', 'APP_LOCALE=es', $contents);

            $url = $request->headers->get('referer');

            $url = str_replace('en', 'es', $url);

        }else{

            $contents = preg_replace('/^APP_LOCALE=.*/m', 'APP_LOCALE=en', $contents);

            $url = $request->headers->get('referer');

            $url = str_replace('es', 'en', $url);

        }


        File::put($envFile, $contents);
    
    return redirect()->to($url);

    }
}