<?php 
// recibimos los datos por metodo POST
$producto = trim(strtoupper($_POST['producto']));
$stock = trim(strtoupper($_POST['stock']));
$precio = trim(strtoupper($_POST['precio']));

require '../config/config_db.php';
$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql = "INSERT INTO tproductos (producto,stock,precio) VALUES ('$producto','$stock','$precio')";
$query = mysqli_query($connect,$sql);
if ($query) {
    echo 1;
} else {
    echo false;
}
mysqli_close($connect);


?>