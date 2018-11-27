<?php 
// recibimos los datos por metodo POST
$id = $_POST['id'];

require '../config/config_db.php';
$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql = "UPDATE tproductos SET estatus = 0 WHERE estatus = 1 and idproducto = '$id'";
$query = mysqli_query($connect,$sql);

$sql = "SELECT estatus FROM tproductos WHERE estatus = 0 and  idproducto = '$id'";
$query = mysqli_query($connect,$sql);

$row = mysqli_fetch_array($query);

if ($row['estatus'] == 0) {
    echo 1;
} else {
    echo 0;
}
mysqli_close($connect);
?>