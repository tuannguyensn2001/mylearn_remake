<?php

function convertStorage($path): string
{
    $path = explode('/',$path);
    $path[0] = '/storage';
    $path = implode('/',$path);
    return asset($path);
}


