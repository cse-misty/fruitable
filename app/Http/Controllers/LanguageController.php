<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage($locale)
{

    if (in_array($locale, ['en', 'bn'])) {
        session()->put('app_locale', $locale);
    }

    return redirect()->back();
}
}
