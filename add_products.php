<?php include('dbKey.php');
$db_handle = new DBConInfo();
$mysqli = $db_handle->connect_db(); ?>
<form action="" method="post">
    <label>Name :</label>
    <input type="text" name="name" required placeholder="Please Enter Name"/><br><br>
    <label>Student Email :</label>
    <input type="email" name="email" required placeholder="qwerty@gmail.com"/><br><br>
    <label>Student City :</label>
    <input type="text" name="city" required placeholder="Please Enter Your City"/><br><br>
    <input type="submit" value=" Submit Details " name="submit"/><br/>
</form>

<?php
if (isset($_POST["submit"])) {

    $sql = "INSERT INTO entries (name, email, city)
VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["city"] . "')";

    if ($mysqli->query($sql) === TRUE) {
        echo "
    <script type= 'text/javascript'>
        alert('New record created successfully');
    </script>";
    } else {
        echo
            "<script type= 'text/javascript'>
        alert('Error: " . $sql . "<br>" . $mysqli->error . "');
    </script>";
    }
}
if (isset($_POST['but_upload'])) {
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

        // Insert record
        $query = "insert into images(name,image) values('" . $name . "','" . $image . "')";

        mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    }
}
?>
<form method="post" action="" enctype='multipart/form-data'>
    <input type='file' name='file'/>
    <input type='submit' value='Save name' name='but_upload'>

</form>