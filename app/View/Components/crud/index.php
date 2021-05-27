<?php

namespace App\View\Components\crud;

use App\Models\Category;
use Illuminate\View\Component;

class index extends Component
{

    public $title;
    public $input;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $rows, $input)
    {
        $this->title = $title;
        $this->rows = $rows;
        $this->input = $input;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {


        return view('components.crud.index');
    }
}
