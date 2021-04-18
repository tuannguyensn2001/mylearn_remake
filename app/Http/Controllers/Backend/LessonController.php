<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.lesson.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $lesson = $request->get('lesson');
        unset($lesson['id']);

        $lesson['order'] = Lesson::query()->orderBy('order','desc')->first()->order+1;
        try{
            $lesson = Lesson::create($lesson);
        } catch (\Exception $exception){
            return response()->json([$exception->getMessage()],500);
        }

        return response()->json([
            'data' => $lesson
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Lesson::query()->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $lesson = $request->get('lesson');
        unset($lesson['id']);
        try {
            $lesson = Lesson::find($id)->update($lesson);
        } catch (\Exception $exception){
            return response()->json([$exception->getMessage()],500);
        }

        return response()->json([
            'data' => Lesson::find($id)
        ],200);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateOrder(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = collect($request->get('data'));

        $data->each(function ($chapter, $index) use ($data) {
            Chapter::query()->where('id', $chapter['id'])
                ->update([
                    'order' => $index + 1
                ]);

            $lessons = collect($chapter['lessons']);

            $lessons->each(function ($lesson, $index2) {
                Lesson::query()->where('id', $lesson)
                    ->update([
                        'order' => $index2 + 1
                    ]);
            });
        });

        $course = Chapter::find($data->first()['id'])->course;

        return response()->json([
            'data' => $course->chapters()->with('lessons', function ($query) {
                return $query->orderBy('order');
            })->get()
        ], 200);
    }

}
