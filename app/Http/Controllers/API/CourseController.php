<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\Course as CourseCollection;

class CourseController extends Controller
{

    public function index(): JsonResponse
    {
        $courses = Course::with('tag','tag.category','media')->get();

        return response()->json([
            'data' =>  CourseCollection::collection($courses),
        ],200);

        return response()->json([
            'data' =>  $courses,
        ],200);
    }

}
