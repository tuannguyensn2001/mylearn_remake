<?php

function convertStorage($path){
    $path = explode('/',$path);
    $path[0] = '/assets/storage';
    $path = implode('/',$path);
    return asset($path);
}


