<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index($slug)
    {
        $course = Course::with('chapters','chapters.lessons')->where('slug',$slug)->first();

        return response()->json($course,200);
    }

}
