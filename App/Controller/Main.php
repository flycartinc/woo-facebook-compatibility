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
        $discounted_price = apply_filters('advanced_woo_discount_rules_get_product_discount_price_from_custom_price', $product_price, $product, 1, 0, 'discounted_price', true, false);

        return ($discounted_price !== false) ? (int)round($discounted_price * 100) : $price;
    }
}