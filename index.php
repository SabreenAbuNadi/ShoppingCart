<?php
require_once("dbKey.php");
$db_handle = new DBConInfo();
?>
<?php
require 'header.php';
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="uploadNewProducts.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Upload To Store" name="submit" id="submit">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<button type="button" style="float:right; margin: 25px 50px 75px 100px" onclick="reloadPage();"><i class="fa fa-refresh" style="font-size:24px; color:red; float:right"></i></button>
<div class="container content-section ">
    <form action="" method="POST" id="search_form" class="search">
        <input type="text" id="myInput" placeholder="Type a search key.." title="Type a search key" name="search" id="list_search">
    </form>
    <div class="container content-section">
        <?php include_once "gallery.php" ?>
    </div>
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
<section class="wrapper" id="contactus">
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