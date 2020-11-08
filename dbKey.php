<?php

class DBConInfo
{
    public $sql_host = "localhost";
    public $sql_username = "root";
    public $sql_password = "";
    public $sql_name = "";
    public $sql_database = "database";

    function connect_db()
    {
        $connect = mysqli_connect($this->sql_host, $this->sql_username, $this->sql_password, $this->sql_database);
        if ($connect->connect_error) {
            die($connect->connect_error);
        }
        return $connect;
    }

    function __construct()
    {
        $connect = $this->connect_db();
        if (!empty($connect)) {
            $this->select_db($connect);
        }
    }

    function select_db($connect)
    {
        $connect = mysqli_connect("localhost", "root", "", $this->sql_database);
        if (!$connect) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $db_select = mysqli_select_db($connect, $this->sql_database) or die('Error: ' . mysqli_error($connect));
        if (!$db_select) {
            die("Database selection failed: " . mysqli_connect_error());
        }
    }

    function runQuery($query)
    {
        $result = mysqli_query($query, "SELECT * FROM product");
        if (!$result) {
            die('Error: ' . mysqli_error($query));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }
}
