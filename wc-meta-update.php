<?php

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

function sharespine_update_modified_date( $product_id ) 
{
	$recently_updated = wp_cache_get( 'recently_updated_'.$product_id, 'sharespine' );
		
	if ( false === $recently_updated ) {
		$recently_updated = wp_update_post( array( 
			'ID' => $product_id,
			'post_modified' => current_time( 'mysql' ),
			'post_modified_gmt' => current_time( 'mysql', 1 )
		) );
		wp_cache_set( 'recently_updated_'.$product_id, $recently_updated, 'sharespine', 30 );
	}
}

function sharespine_update_product_date_on_meta( $meta_id, $object_id, $meta_key, $meta_value ) 
{
	$post = get_post( $object_id );
	$post_types = array( 'product', 'product_variation' );
	$excluded_keys = array(
		'_edit_lock'
	);
	
	error_log( 'METAKEY: '.$meta_key );
	
	if ( $post && ! in_array( $meta_key, $excluded_keys ) && in_array( $post->post_type, $post_types ) ) {
		sharespine_update_modified_date( $post->ID );
	}
}
add_action( 'updated_postmeta', 'sharespine_update_product_date_on_meta', 10, 4 );

function sharespine_update_product_date_on_stock( $wc_product ) 
{
	sharespine_update_modified_date( $wc_product->get_id() );
}
add_action( 'woocommerce_product_set_stock', 'sharespine_update_product_date_on_stock' );
add_action( 'woocommerce_variation_set_stock', 'sharespine_update_product_date_on_stock' );
