<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Generator;

class ScanIndexController extends Controller
{
    public function __invoke()
    {
        return view('scans.index', [
            'qr' => (new Generator())->size(300)->generate(route('orders.create'))
        ]);
    }
}
