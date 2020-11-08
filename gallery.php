<?php
require_once("dbKey.php");
$db_handle = new DBConInfo();
$mysqli = $db_handle->connect_db();
if (isset($_POST['search'])) {
    $data = mysqli_real_escape_string($mysqli, $_POST['search']);
    $keyword = trim(preg_replace('/\s+/', ' ', $data));
    $sql = mysqli_query($mysqli, "SELECT name, picture, price FROM `product` WHERE name LIKE
    '%$keyword%'");
    if (!$sql) {
        die('Error: ' . mysqli_connect_error());
    }
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
?>
            <div class="product-item">
                <div class="product-image">
                    <img src='<?php echo $row["picture"]; ?>' height="300" width="250">
                </div>
                <div class=" product-info">
                    <strong><?php echo $row["name"]; ?></strong>
                </div>
                <div class="product-price product-info">
                    <?php echo $row["price"]; ?>
                </div>
                <div class=" product-info">
                    <button type="button" class="btn" name="edit" data-toggle="modal" data-target="#EditProductModal" data-whatever="@mdo"><a href="uploadNewProducts.php?edit_id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></button>
                    <div class="modal fade" id="EditProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Product Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="uploadNewProducts.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">ID</label>
                                            <input type="text" class="form-control" name="id">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Price</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" id="image">
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Upload To Store" name="submit" id="submit">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class=" product-info">
                    <button class="btn" name="delete"><a href="uploadNewProducts.php?delete_id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a></button>
                </div>
                <button class="btn btn-primary shop-item-button" type="supmit" value="add to cart" onClick="cartAction('add','<?php echo $row["code"]; ?>')" id="add_<?php echo $row["code"]; ?>">add
                    to card
                </button>
            </div>
        <?php
        }
    } else { ?>
        <p>Your search - did not match any products.</p>
<?php
        include_once "storeWithDb.php";
    }
} else {
    include_once "storeWithDb.php";
}
?>
