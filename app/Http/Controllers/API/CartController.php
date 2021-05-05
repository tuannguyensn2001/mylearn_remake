<?php

namespace App\Http\Controllers\API;

use App\Entities\Cart;
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
            $cart = json_decode(Redis::get($key), true);
        }

        $course = Course::query()->whereIn('id', $cart)->get();

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
            if (!Redis::get($key)) {
                Redis::set($key, json_encode([]));
            }

            $courseList = json_decode(Redis::get($key), true);

            if (!in_array($courseId, $courseList)) {
                array_push($courseList, $courseId);
            }

            Redis::set($key, json_encode($courseList));
        } catch (\Exception $exception) {
            return response()->json([], 500);
        }

        return response()->json([
            'course' => new CourseResource(Course::find($courseId)),
        ]);

    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $userId = Auth::user()->id;
        $key = "cart:user:${userId}";
        $courseList = collect(json_decode(Redis::get($key), true));

        $courseList = $courseList->filter(function ($item) use ($id) {
            return $item != $id;
        });

        Redis::set($key, json_encode($courseList));


        return response()->json([
            'id' => $id,
        ], 200);
    }

    public function buyCourse(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $course = $request->get('course');

            $price = Course::query()
                ->whereIn('id', $course)
                ->sum('price');

            $wallet = Auth::user()->wallet->amount;

            if ($wallet < $price) throw new \Exception('Số tiền trong tài khoản của bạn không đủ để thực hiện giao dịch');

            Cart::update(function ($cart) use ($course) {
                return $cart->filter(function ($item) use ($course) {
                    return !in_array($item, $course);
                });
            });

            Auth::user()->wallet->amount = $wallet - $price;
            Auth::user()->wallet->save();

            Auth::user()->courses()->attach($request->get('course'));


        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response()->json([
            'message' => 'Thành công',
            'courses' => CourseResource::collection(Auth::user()->courses)
        ], 200);


    }

}
