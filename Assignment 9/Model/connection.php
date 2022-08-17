<?php
class db{
 
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "project";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
 }

 function Search($conn,$id)
 {
    $table="product";
    if($id!="")
    {
        $result = $conn->query("SELECT * FROM `product` WHERE product_name LIKE '%$id%'");
        return $result;
    }
 }
function CloseCon($conn)
{
    $conn -> close();
}
}
?>