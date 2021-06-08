<?php

namespace App\View\Components\crud;

use App\Defines\Relationship;
use Illuminate\View\Component;

class form extends Component
{

    public $input;
    public $isEdit;
    public $instance;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($input, $instance = null, $isEdit = false)
    {
        $this->isEdit = $isEdit;
        $this->input = $input;
        $this->instance = $instance;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->handleInput();

        return view('components.crud.form');
    }

    public function handleInput()
    {
        foreach ($this->input as &$item) {
            $name = $item['name'];
            if (!isset($item['value'])) {

                if(is_null($this->instance)){
                    $item['value'] = old($name);
                } else {
                    $item['value'] = old($name, $this->instance->$name);
                }


                if (isset($item['relationship']) && $item['relationship'] === Relationship::_ONE_TO_MANY && $item['element'] !== 'select') {
                    $models = $item['models'];
                    $attribute = $item['attribute'];

                    $item['value'] = $this->instance->$models->$attribute;
                }

            }
        }
    }

}
