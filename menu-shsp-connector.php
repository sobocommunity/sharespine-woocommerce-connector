<?php

if ( ! defined( "ABSPATH" ) ) {
    die;
}

add_action('admin_menu', 'shsp_admin_menu' );

function shsp_admin_menu() {
	add_menu_page(
        "Sharespine Connector",
        "Sharespine Connector",
        "read",
        "shsp-connector-menu",
        "shsp_show_admin_menu_page"
    );
}

function shsp_show_admin_menu_page()
{
    $assetdir = plugin_dir_url(realpath(dirname(__FILE__))) . "assets";
    include "assets/admin-menu-page.php";
}
?>
