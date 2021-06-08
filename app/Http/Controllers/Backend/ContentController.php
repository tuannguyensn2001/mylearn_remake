<?php

namespace App\Http\Controllers\Backend;

use App\Defines\Relationship;
use App\Http\Controllers\Base\CRUDController;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ContentController extends CRUDController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $data = \App\Models\Course::all()->map(function ($item) {
            return [
                'key' => $item->id,
                'value' => $item->name
            ];
        })->toArray();


        $this->addFields([
            [
                'label' => 'Nội dung',
                'name' => 'content',
                'id' => 'content',
                'element' => 'input',
                'type' => 'text',
//                'value' => old('content'),
                'placeholder' => 'Nhập nội dung',
                'class' => 'form-control'
            ],
            [
                'label' => 'Loại nội dung',
                'name' => 'type',
                'id' => 'type',
                'element' => 'select',
                'data' => \App\Defines\Content::getListsByKeyValue(),
//                'value' => old('type'),
                'placeholder' => 'Nhập loại nội dung',
                'class' => null
            ],
            [
                'element' => 'select',
                'label' => 'Khóa học',
                'id' => 'course_id',
                'name' => 'course_id',
//                'value' => old('course_id'),
                'placeholder' => 'Chọn khóa học',
                'class' => null,
                'data' => $data,
                'relationship' => Relationship::_ONE_TO_MANY,
                'models' => Course::class,
            ]
        ]);
        return $this->crudCreate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        return $this->crudStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Models\Course::all()->map(function ($item) {
            return [
                'key' => $item->id,
                'value' => $item->name
            ];
        })->toArray();


        $this->addFields([
            [
                'label' => 'Nội dung',
                'name' => 'content',
                'id' => 'content',
                'element' => 'input',
                'type' => 'text',
//                'value' => old('content'),
                'placeholder' => 'Nhập nội dung',
                'class' => 'form-control'
            ],
            [
                'label' => 'Loại nội dung',
                'name' => 'type',
                'id' => 'type',
                'element' => 'select',
                'data' => \App\Defines\Content::getListsByKeyValue(),
//                'value' => old('type'),
                'placeholder' => 'Nhập loại nội dung',
                'class' => null
            ],
            [
                'element' => 'select',
                'label' => 'Khóa học',
                'id' => 'course_id',
                'name' => 'course_id',
//                'value' => old('course_id'),
                'placeholder' => 'Chọn khóa học',
                'class' => null,
                'data' => $data,
                'relationship' => Relationship::_ONE_TO_MANY,
                'models' => 'course',
                'attribute' => 'name'
            ]
        ]);
        return $this->crudEdit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        return $this->crudUpdate($request,$id);
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

    function getModel()
    {
        return Content::class;
    }

    function getKey()
    {
        return [
            'name' => 'contents',
            'key' => 'content'
        ];
    }

    function getRequest()
    {
        // TODO: Implement getRequest() method.
    }

    function getData(): array
    {
        return [
            'content',
            'type',
            'course_id'
        ];
    }
}
