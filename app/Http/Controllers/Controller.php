<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use app\Http\Controllers\Auth\ChatbotController;
use app\Http\Controller\NoteController;
use app\Http\Controller\CourseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
