<?php


namespace App\Http\Controllers\Base;


use App\Exceptions\CRUDException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CRUDController extends Controller
{


    abstract function getModel();

    abstract function getKey();

    abstract function getRequest();

    abstract function getData();

    public function crudIndex(Request $request, \Closure $handle = null)
    {
        try {
            return $handle();
        } catch (\Exception $exception) {
            if ($exception instanceof CRUDException) {
                $variable = $this->getKey()['name'];
                $$variable = app()->make($this->getModel())->all();
                return view("backend.{$this->getKey()['key']}.index", compact($variable));
            }
        }

        return null;
    }

    public function crudCreate(\Closure $closure = null)
    {
        $data = !is_null($closure) ? $closure() : [];
        return view("backend.{$this->getKey()['key']}.create", $data);
    }

    public function crudStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only(...$this->getData());


        try {
            app()->make($this->getModel())::create($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('failed', 'Thêm mới thất bại')->withInput();
        }

        return redirect()->route("{$this->getKey()['name']}.index")->with('success', 'Thêm mới thành công');
    }

    public function crudEdit($id)
    {
        $name = $this->getKey()['key'];

        $$name = app()->make($this->getModel())::findOrFail($id);

        return view("backend.{$this->getKey()['key']}.edit", compact($name));
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function crudUpdate(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $name = $this->getKey()['key'];

        $$name = app()->make($this->getModel())::findOrFail($id);

        $data = $request->only(...$this->getData());

        try {
            $$name->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('failed', 'Sửa không thành công, vui lòng thử lại');
        }

        return redirect()->route("{$this->getKey()['name']}.index")->with('success', 'Sửa thành công');
    }


}
