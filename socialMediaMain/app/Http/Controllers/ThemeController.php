<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{


    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkThemeManager');
    }


    /**
     * Display a listing of the resource.
     *
     * @return string
     */

    public function index()
    {

        $themes= Theme::all();
        return view('theme.index')->with('themes',$themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data= request()->validate([
            'name' => ['required', 'string'],
            'cdn_url' => ['required', 'string','url'],
        ]);

        auth()->user()->createdThemes()->create($data);
        $themes= Theme::all();

        return redirect('theme')->with('themes',$themes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Theme $theme)
    {
        return view('theme.show')->with([
            'theme'=> $theme,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Theme $theme)
    {
        return view('theme.edit')->with([
            'theme'=> $theme,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Theme $theme)
    {
        request()->validate([
            'name' => ['required', 'string'],
            'cdn_url' => ['required', 'string','url'],
        ]);

        $theme->name= $request->name;
        $theme->cdn_url=$request->cdn_url;
        $theme->save();
        return redirect()->route('theme');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('theme');
    }
}
