<?php
require_once("product.php");
$product = new Product();
$productArray = $product->getAllProduct();
?>
<?php
if (!empty($productArray)) {
    foreach ($productArray as $k => $v) {
?>
        <div class="product-item">
            <div class="product-image">
                <img src="<?php echo $productArray[$k]["image"]; ?>" width="250" height="300">
            </div>
            <div class="product-info">
                <strong><?php echo $productArray[$k]["name"]; ?></strong>
            </div>
            <div class="product-price product-info">
                <?php echo $productArray[$k]["price"]; ?>
            </div>
            <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
        </div>
<?php
    }
}
?>