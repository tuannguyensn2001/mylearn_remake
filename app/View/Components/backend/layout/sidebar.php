<?php

namespace App\View\Components\backend\layout;

use Illuminate\View\Component;

class sidebar extends Component
{

    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = "Tuấn";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.layout.sidebar');
    }
}
