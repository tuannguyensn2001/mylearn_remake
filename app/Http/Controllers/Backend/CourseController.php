<?php

namespace App\Http\Controllers\Backend;

use App\Defines\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Tag;
use App\Traits\StorageFile;
use Google\Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    use StorageFile;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('backend.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('backend.course.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return RedirectResponse
     */
    public function store(CourseRequest $request): RedirectResponse
    {

        $validator = Validator::make($request->all(),[
            'file' => 'required|file'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }


        $file = $request->file('file');

        try {
            $media = \App\Models\Media::create([
                'source' => $this->uploadFile($file,Media::_PATH_COURSE),
                'type' => $file->getClientOriginalExtension(),
            ]);

            Course::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'level' => $request->input('level'),
                'media_id' => $media->id,
                'tag_id' => $request->input('tag_id'),
                'status' => $request->input('status'),
            ]);



        } catch (Exception $exception){
            return redirect()->back()->with('sucess','Thêm mới thất bại');
        }

        return redirect()->back()->with('sucess','Thêm mới thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
