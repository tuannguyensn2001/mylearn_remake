<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index($slug): \Illuminate\Http\JsonResponse
    {
        $course = Course::with([
            'chapters' => function ($query) {
                return $query->orderBy('order');
            },
            'chapters.lessons' => function ($query) {
                return $query->orderBy('order');
            }
        ])->where('slug', $slug)->first();

        return response()->json($course, 200);
    }

    public function show($course, $lesson)
    {
        $lesson = Course::query()->where('slug', $course)
            ->first()->chapterLesson()->where('slug', $lesson)->first();
        return response()->json([
            'data' => $lesson
        ]);
    }

}
