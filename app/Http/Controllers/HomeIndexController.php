<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class HomeIndexController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $route = auth()->check() ? 'platform.main' : 'orders.create';
        return redirect()->route($route);
    }
}
