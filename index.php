<?php
require 'header.php';
?>
<div class="container content-section">
    <?php include_once "store.php" ?>
</div>
<section class="container content-section">
    <form action='submit-cart.php' method="POST">
        <h2 class="section-header">SHOPPING CART</h2>
        <div class="cart-row">
            <span class="cart-item cart-header cart-column" name="item">ITEM</span>
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column"></span>
        </div>
        <div class="cart-items" name="cart-items">
        </div>
        <div class="cart-total">
            <strong class="cart-total-title">Total</strong>
            <span class="cart-total-price">$0</span>
        </div>
        <button class="btn btn-primary btn-purchase" type="submit">PURCHASE</button>
    </form>
</section>
<section class="wrapper">
    <h2>Contact us</h2>
    <div id="error_message">
    </div>
    <form action="" id="myform" onsubmit="return validate();">
        <div class="input_field">
            <input type="text" placeholder="Name" id="name">
        </div>
        <div class="input_field">
            <input type="text" placeholder="Subject" id="subject">
        </div>
        <div class="input_field">
            <input type="text" placeholder="Phone" id="phone">
        </div>
        <div class="input_field">
            <input type="text" placeholder="Email" id="email">
        </div>
        <div class="input_field">
            <textarea placeholder="Message" id="message"></textarea>
        </div>
        <div class="bnt">
            <input type="submit">
        </div>
    </form>
</section><br>
<?php
require 'footer.php';
?>