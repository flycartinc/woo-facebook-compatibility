<?php

namespace WFPC\App;

use WFPC\App\Controller\Main;

defined("ABSPATH") or die();
class Router
{
    /**
     * @var Main
     */
    private static $main;

    function init()
    {
        self::$main = empty(self::$main) ? new Main() : self::$main;

        add_filter('wc_facebook_product_price', [self::$main, 'getConvertedPrice'], 10, 3);

    }
}