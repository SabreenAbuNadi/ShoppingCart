<div id="cart-item">
</div>
<?php
require 'header.php';
require_once "ajax-action.php";
if (!isset($_SESSION["cart_item"])) {
?>
    <p class="section-header" style="color:red"> No products selected! </p>
    <button class="btn btn-primary btn-purchase" type="submit"><a href="index.php">Back To Store</a></button>
<?php
} else if (isset($_SESSION["cart_item"])) {
    $item_total = 0;
?>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION["cart_item"] as $item) {
                ?>
                    <tr>
                        <td><?php echo $item["name"]; ?></td>
                        <td><?php echo $item["code"]; ?></td>
                        <td><?php echo "$" . $item["price"]; ?></td>
                    </tr>
                <?php
                    $item_total += $item["price"];
                }
                ?>

                <tr>
                    <td><strong>Total:</strong></td>
                    <td><strong><?php echo "$" . number_format($item_total, 2); ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <button class="btn btn-primary btn-purchase" type="submit"><a href="index.php">Back To Store</a></button>
        <?php
        $_SESSION["cart_item"] = NULL;
        ?>
    </div>
<?php
}
require 'footer.php';
?>