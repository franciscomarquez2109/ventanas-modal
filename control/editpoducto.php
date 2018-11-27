<?php 
// recibimos los datos por metodo POST
$id = $_POST['idproductoedit'];
$producto = trim(strtoupper($_POST['productoedit']));
$stock = trim(strtoupper($_POST['stockedit']));
$precio = trim(strtoupper($_POST['precioedit']));

require '../config/config_db.php';
$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql = "UPDATE tproductos SET producto='$producto', stock='$stock', precio='$precio' WHERE estatus = 1 and idproducto = '$id'";
$query = mysqli_query($connect,$sql);
mysqli_close($connect);
echo 1;

?>