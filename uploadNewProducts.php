<?php include('dbKey.php');
$db_handle = new DBConInfo();
$mysqli = $db_handle->connect_db();
if (isset($_POST["submit"])) {
    echo "sab1 <br>";
    $name = $_FILES['image']['name'];
    echo "sab1 <br>";
    $target_dir = "uploads/";
    echo "sab1 <br>";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    echo "sab1 <br>";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    echo "sab1 <br>";
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    echo "sab1 <br>";
    if (in_array($imageFileType, $extensions_arr)) {
        echo "sab1 <br>";
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name);
        echo "sab1 <br>";
        $sql = "INSERT INTO product (id, name, description, price, picture)
    VALUES ('" . $_POST["id"] . "','" . $_POST["name"] . "', '" . $_POST["description"] . "','" . $_POST["price"] . "', '" . $target_dir . $name . "')";
        if (mysqli_query($mysqli, $sql)) {
            echo '<script>alert("Product details absorbed into the system")</script>';
        }
        header('location: index.php');
    }
}
if (isset($_GET["edit_id"])) {
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM product WHERE id =" . $_GET['edit_id'];
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $target_dir = "uploads/";
        $picture = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $picture);
        $update = "UPDATE product SET  id='" . $id . "', name ='" . $name . "', description='" . $description . "',price= '" . $price . "',picture='" . $target_dir . $picture . "'  WHERE id=$id";
        mysqli_query($mysqli, $update);
        header('location: index.php');
    }
}
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    mysqli_query($mysqli, "DELETE FROM product WHERE id=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: index.php');
}
?>


