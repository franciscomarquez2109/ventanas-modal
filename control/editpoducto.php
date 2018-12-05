<?php 
// recibimos los datos por metodo POST
$id = $_POST['idproductoedit'];
$producto = trim(strtoupper($_POST['productoedit']));
$stock = trim(strtoupper($_POST['stockedit']));
$precio = trim($_POST['precioedit']);

$precio1 =  str_replace('.', '', $precio);
$precio2 =  str_replace(',', '.', $precio1);

require '../config/config_db.php';
$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql = "UPDATE tproductos SET producto='$producto', stock='$stock', precio='$precio2' WHERE estatus = 1 and idproducto = '$id'";
$query = mysqli_query($connect,$sql);
mysqli_close($connect);
echo 1;

?>