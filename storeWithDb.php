<?php
require_once("dbKey.php");
$db_handle = new DBConInfo();
$mysqli = $db_handle->connect_db();
$result = mysqli_query($mysqli, "SELECT * FROM product ORDER BY name  ASC");
if (!empty($result)) {
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
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
                <button type="button" class="btn" name="edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" edit_id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i>
                </button>
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
}
?>
<section>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
        <i class="material-icons" style="font-size:48px;color:#1E90FF;margin: 110px 60px 60px;
		height:150px; width:130px;">add_to_photos</i>
    </button>
</section>
