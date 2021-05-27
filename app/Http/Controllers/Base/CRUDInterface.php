<?php


namespace App\Http\Controllers\Base;


interface CRUDInterface
{
    public function getModel();

    public function key();

}
