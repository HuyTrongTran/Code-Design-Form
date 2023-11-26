<?php
if (isset($_GET["ID"])){
    $ID=$_GET["ID"];

    $servername="localhost";
    $username="root";
    $password="";
    $database="quanlybds_team02";
    
    $connection=new mysqli($servername,$username,$password,$database);

    $sql= "DELETE FROM full_contract WHERE ID = {$ID}" ;
    $connection->query($sql);
    $connection->close();
}
header("location:index.php");
exit;
?>