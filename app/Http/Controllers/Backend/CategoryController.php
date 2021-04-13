<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->query('api') && boolval($request->query('api'))){
            return response()->json([
                'data' => $categories
            ],200);
        }

            return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $categories = $request->only('name', 'slug', 'description');

        try {
            Category::create($categories);
        } catch (\Exception $exception) {
            return redirect()->back()->with('failed', 'Thêm mới thất bại')->withInput();
        }

        return redirect()->route('categories.index')->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id,Request $request): JsonResponse
    {
        if ($request->query('tag') && boolval($request->query('tag'))){
            return response()->json([
                'data' => Tag::where('category_id',$id)->get()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $data = $request->only('name', 'slug', 'description');

        try {
            $category->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('failed', 'Sửa không thành công, vui lòng thử lại');
        }

        return redirect()->route('categories.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(Request $request, $id): JsonResponse
    {


        Category::find($id)->delete();

        Session::flash('success', 'Xóa thành công');

        return response()->json([], 200);
    }


}
