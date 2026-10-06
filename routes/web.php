<?php

use App\Services\SystemsService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $systems = (new SystemsService)->getSystems();

    return view('hub', compact('systems'));
});
