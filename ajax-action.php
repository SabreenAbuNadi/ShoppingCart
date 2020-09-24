<?php
session_start();
require_once("product.php");
$product = new Product();
$productArray = $product->getAllProduct();
if (!empty($_POST["action"])) {
    if (!empty($_POST["quantity"])) {
        $productByCode = $productArray[$_POST["code"]];
        $itemArray = array($productByCode["code"] => array(
            'name' => $productByCode["name"],
            'code' => $productByCode["code"],
            'price' => $productByCode["price"]
        ));

        if (!empty($_SESSION["cart_item"])) {
            $cartCodeArray = array_keys($_SESSION["cart_item"]);
            if (in_array($productByCode["code"], $cartCodeArray)) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                }
            } else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
            }
        } else {
            $_SESSION["cart_item"] = $itemArray;
        }
    }
}

