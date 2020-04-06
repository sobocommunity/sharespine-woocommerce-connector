<?php

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

function shsp_lastModifiedAtOrAfter_filter($request)
{
    /** Add lastmod to query */
    $lm = $_GET["lastModifiedAtOrAfter"];
    if ($lm) {
        $request['date_query'] = array(
            'relation' => 'OR',
            array(
                "after" => $lm,
                "column" => "post_modified_gmt",
                "compare" => ">=",
                "inclusive" => true
            ),
            array(
                "after" => $lm,
                "column" => "post_modified",
                "compare" => ">=",
                "inclusive" => true
            )
        );
    }

    return $request;
}

add_filter("woocommerce_rest_shop_order_object_query", 'shsp_lastModifiedAtOrAfter_filter');

add_filter("woocommerce_rest_product_object_query", 'shsp_lastModifiedAtOrAfter_filter');
add_filter("woocommerce_rest_product_query", 'shsp_lastModifiedAtOrAfter_filter');

?>
