<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Repositories\Course\CourseRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource ;

class CourseController extends Controller
{

    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index(): JsonResponse
    {

        return response()->json([
            'data' =>  CourseResource::collection($this->courseRepository->all()),
        ],200);

    }

}
