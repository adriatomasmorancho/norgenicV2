<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->getPreferredLanguage(['en', 'es']);

    if ($sessionLocale = Session::get('locale')) {
        $locale = $sessionLocale;

    }
  
    if (!in_array($locale, ['en', 'es'])) {
        $locale = config('app.locale');
    }

    App::setLocale($locale);

    
    Session::put('locale', $locale);

    return $next($request);
    }
}