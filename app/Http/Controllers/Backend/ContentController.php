<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\CRUDController;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
