<?php

namespace App\View\Components\crud;

use Illuminate\View\Component;

class form extends Component
{

    public $input;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.crud.form');
    }
}
