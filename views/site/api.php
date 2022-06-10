<?php

session_start();

require "functions.php";

if ( isset($_POST['ID']) ) {

    $current_added_product = get_product_by_id($_POST['ID']);

    if ( !isset($_SESSION['basket_list'])) {
        $_SESSION['basket_list'][] = $current_added_product;
        echo count($_SESSION['basket_list']);
    }
    $product_check = false;

    if ( isset($_SESSION['basket_list'])) {
        foreach ($_SESSION['basket_list'] as $value) {
            if ( $value['ID'] == $current_added_product['ID']) {
                $product_check = true;
            }
        }
    }

    if ( !$product_check ) {
        $_SESSION['basket_list'][] = $current_added_product;
        echo "success, new product add";
    }
}

