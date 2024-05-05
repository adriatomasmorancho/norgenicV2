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
        $locale = Session::get('locale');

        if (!$locale) {
            $locale = $request->getPreferredLanguage(['en', 'es']);
        }

        if (!in_array($locale, ['en', 'es'])) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        Session::put('locale', $locale);

        return $next($request);
    }
}