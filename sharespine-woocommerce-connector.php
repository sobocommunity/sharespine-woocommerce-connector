<?php
/**
* Plugin Name: Sharespine Woocommerce Connector
* Description: Easily connect marketplaces and/or ERP systems to your webshop using Sharespine. Extends WooCommerce REST API with additional functionality used by Plugboard.
* Version: 4.0.24
* Author: Sharespine AB
* Author URI: https://www.sharespine.com
* Developer: Sharespine AB
* Developer URI: https://www.sharespine.com
*
* WC requires at least: 3.0
* WC tested up to: 3.4.4
*
* Copyright: © 2017-2018 Sharespine AB
* License: GPL3
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

require_once dirname( __FILE__ ) .'/api-resource-info.php';
require_once dirname( __FILE__ ) .'/api-lastmodifiedatorafter-filter.php';
require_once dirname( __FILE__ ) .'/wc-meta-update.php';
require_once dirname( __FILE__ ) .'/api-product-extensions.php';
require_once dirname( __FILE__ ) .'/menu-shsp-connector.php';

?>