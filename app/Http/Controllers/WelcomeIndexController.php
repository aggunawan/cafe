<?php

namespace App\Http\Controllers;

class WelcomeIndexController extends Controller
{
    public function __invoke()
    {
        return view('welcomes.index');
    }
}
