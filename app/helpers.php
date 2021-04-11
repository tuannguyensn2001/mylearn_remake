<?php

function convertStorage($path): string
{
    $path = explode('/',$path);
    $path[0] = '/assets/storage';
    $path = implode('/',$path);
    return asset($path);
}


