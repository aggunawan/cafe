<?php

namespace App\Http\Controllers;

class MenuIndexController extends Controller
{
    public function __invoke()
    {
        return view('menus.index');
    }
}
