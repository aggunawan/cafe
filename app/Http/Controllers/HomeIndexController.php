<?php

namespace App\Http\Controllers;

class HomeIndexController extends Controller
{
    public function __invoke()
    {
        return view('homes.index');
    }
}
