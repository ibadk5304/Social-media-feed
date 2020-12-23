<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function setThemeCookie(Response $response){

        $themeId= request()->themes;

        return redirect()->back()->cookie(
            'themeId', $themeId
        );
    }

    public function getThemeCookie(Request $request){

        $value = $request->cookie('themeName');
        dd($value);
    }
}
