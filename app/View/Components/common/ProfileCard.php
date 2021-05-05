<?php

namespace App\View\Components\common;

use Illuminate\View\Component;

class ProfileCard extends Component
{

    public $img;
    public $name;
    public $email;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($img,$name,$email)
    {
        $this->img = $img;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('components.common.profile-card');
    }
}
