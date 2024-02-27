<?php

namespace WFPC\App\Controller;

use WDR\Core\Helpers\Discount;

defined("ABSPATH") or die();

class Main
{
    /**
     * Get converted price.
     *
     * @param $price
     * @param $facebook_price
     * @param $product
     * @return int
     */
    function getConvertedPrice($price, $facebook_price, $product): int
    {
        if ($facebook_price) {
            return $price;
        }
        $product_price = Discount::getProductPrice($product, $product->get_id(), '');
        $discounted_price = apply_filters('wdr_get_product_discounted_price', $product_price, $product, 1, $facebook_price);
        return ($discounted_price !== false) ? (int)round($discounted_price * 100) : $price;
    }
}