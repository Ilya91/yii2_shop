<?php

namespace shop\helpers;

class PriceHelper
{
    public static function format($price)
    {
        return number_format($price, 0, '.', ' ');
    }
} 