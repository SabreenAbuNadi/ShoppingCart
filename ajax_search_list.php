<?php
include("dbKey.php");
$db_handle = new DBConInfo();
if (isset($_GET['search']) && $_GET['search'] != "") :
    $data = mysqli_real_escape_string($db_handle->connect_db(), $_GET['search']);
    $keyword = trim(preg_replace('/\s+/', ' ', $data));
    $sql = $db_handle->connect_db()->query("SELECT distinct name FROM `product` WHERE name LIKE
   '%$keyword%' limit 10");
    $count = mysqli_num_rows($sql);
    if ($count != 0) :
        $json_data = array();
        foreach ($sql as $key => $value):
            $json_data[] = $value['name'];
        endforeach;
        echo json_encode($json_data);
    else :
        echo 0;
    endif;
endif;
