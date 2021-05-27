<?php


namespace App\Traits;


trait CRUD
{
    public function index()
    {
        $model = app()->make($this->getModel());
    }
}
