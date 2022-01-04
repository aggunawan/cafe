<?php

namespace App\Http\Controllers;

class OrderCreateController extends Controller
{
    public function __invoke()
    {
        return view('orders.create');
    }
}
