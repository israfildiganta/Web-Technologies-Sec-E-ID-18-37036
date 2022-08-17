<?php
     include "../Model/connection.php";
    
    $id=$_GET["name"];
   echo var_dump($id);
   
    $connection=new db();
    $connobj=$connection->OpenCon();
    // echo $id;
    // echo $name;
    $result=$connection->Search($connobj,$id);
    $connection->CloseCon($connobj);
    
    
    if($result->num_rows>0)
    {
        echo "<table>";    
        while($row=$result->fetch_assoc())
        {
            echo "<tr><td>".$row["product_name"]."</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<b>0 result found<b>";
    }
?>