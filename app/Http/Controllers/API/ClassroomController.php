<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class ClassroomController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Auth::user()->classrooms
        ]);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $classroom = $request->get('classroom');

        $code = Classroom::genCode();
        $classroom['code'] = $code;
        $classroom['created_by'] = Auth::user()->id;

        try {
            DB::beginTransaction();
            $classroom = Classroom::create($classroom);

            Auth::user()->classrooms()->attach($classroom->id, ['role' => \App\Defines\Classroom::_TEACHER]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response()->json([
            'data' => $classroom,
            'message' => trans('classroom.create.success')
        ]);

    }
}
