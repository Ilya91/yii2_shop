<?php

namespace shop\helpers;

class WeightHelper
{
    public static function format($weight)
    {
        return $weight / 1000 . ' kg';
    }
}