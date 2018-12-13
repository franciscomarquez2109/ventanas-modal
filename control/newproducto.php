<?php 
// recibimos los datos por metodo POST
$producto = trim(strtoupper($_POST['producto']));
$stock = trim(strtoupper($_POST['stock']));
$precio = trim(strtoupper($_POST['precio']));
$destino = trim(strtoupper($_POST['hidden_destino']));

require '../config/config_db.php';
$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$sql = "INSERT INTO tproductos (producto,stock,precio,destino) VALUES ('$producto','$stock','$precio','$destino')";
$query = mysqli_query($connect,$sql);
if ($query) {
    echo 1;
} else {
    echo false;
}
mysqli_close($connect);


?>