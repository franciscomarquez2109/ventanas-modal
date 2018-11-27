<?php 

$id = $_POST['id'];

require '../config/config_db.php';
$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql = "SELECT * FROM tproductos WHERE estatus = 1 and idproducto = '$id'";
$query = mysqli_query($connect,$sql);

$row = mysqli_fetch_array($query);
mysqli_close($connect);
$productos = array($row['idproducto'],$row['producto'],$row['stock'],number_format($row['precio'],2,',','.'));

echo json_encode($productos);
?>