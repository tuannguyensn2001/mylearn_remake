<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        $userId = Auth::user()->id;

        $key = "cart:user:${userId}";

        if (!Redis::get($key)) $cart = [];
        else {
            $cart = json_decode(Redis::get($key),true);
        }

        $course = Course::query()->whereIn('id',$cart)->get();

        return response()->json([
            'cart' => CourseResource::collection($course),
        ]);

    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $userId = Auth::user()->id;
        $courseId = $request->get('courseId');
       try {
           $key = "cart:user:${userId}";
           if (!Redis::get($key)){
               Redis::set($key,json_encode([]));
           }

           $courseList = json_decode(Redis::get($key),true);

           if(!in_array($courseId,$courseList)){
               array_push($courseList,$courseId);
           }

           Redis::set($key,json_encode($courseList));
       } catch (\Exception $exception){
           return response()->json([],500);
       }

        return response()->json([
            'course' => Course::find($courseId)
        ]);

    }

}
