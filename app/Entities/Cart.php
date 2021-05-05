<?php


namespace App\Entities;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class Cart
{
    public static function get(): \Illuminate\Support\Collection
    {
        return collect(json_decode(Redis::get(self::getKey())));
    }

    public static function update($condition)
    {
        $cart = $condition(self::get());
        Redis::set(self::getKey(), json_encode($cart));
    }

    private static function getKey()
    {
        $userId = Auth::user()->id;
        return "cart:user:${userId}";
    }

}
