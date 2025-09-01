<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Minimal structure, no custom middleware or aliases needed here
    protected $middleware = [];
    protected $middlewareGroups = [];
}