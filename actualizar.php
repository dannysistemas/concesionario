<?php
include 'conn.php';	
$txtid = $_POST['txtid']; 
$txtest = $_POST['txtest'];
echo "".$txtid;
echo "".$txtest;

// Connection variables
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if($txtest=='A'){
    echo"Entro1";
    $result = mysqli_query($conn, "UPDATE vehiculo SET estado='I' WHERE id_vehiculo=$txtid");
    echo"".$result;
    header ("Location: index.php");
}
else{
    echo"Entro2";
    $result = mysqli_query($conn, "UPDATE vehiculo SET estado='A' WHERE id_vehiculo=$txtid");
    header ("Location: admin/index.php");
}


?>