<?php

namespace shop\helpers;

class PriceHelper
{
    private const NO_PRICE = 'Цена не установлена';
    private static function notNull($price): string
    {
        if ($price === 0 || $price === null || $price === '0')
            return 1;
        return 0;
    }
    public static function format($price): string
    {
        if (self::notNull($price))
            return self::NO_PRICE;
        return number_format($price, 0, '.', ' ')."&#8381;";
    }

    public static function percent ($new_price, $old_price) : string
    {
        if( $old_price>$new_price) {
            $percent = (($new_price / $old_price ) * 100) - 100 ;
            return round($percent)."&#8381;";
        }else{
            return false;
        }
    }
} 