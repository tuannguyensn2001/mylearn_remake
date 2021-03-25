<?php

namespace App\View\Components\common;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{

    public $class;
    public $text;


    /**
     * Create a new component instance.
     *
     * @param $class
     * @param $text
     */
    public function __construct($class,$text)
    {
        $this->class = $class;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.common.button');
    }
}
