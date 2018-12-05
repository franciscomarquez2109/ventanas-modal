<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gestion de Productos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="./assets/css/datatables.bootstrap4.css">
  <script src="assets/js/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="assets/js/datatables.min.js"></script>
  <script src="assets/js/datatables.bootstrap4.js"></script>
</head>
<body>

<div class="container">
<br>
  <h2>Gestión de Productos</h2>
  <p>Registrar, Modificar, Desactivar Productos de una tienda.</p>
  <hr>
  <div class="row">
    <div class="col-md-4">
        <form id="form-newproducto">
            <div class="form-group row">
                <input class="form-control" type="text" name="producto" id="producto" placeholder="Producto" autofocus>
            </div>
            <div class="form-group row">
                <input class="form-control" type="text" name="stock" id="stock" placeholder="Stock">
            </div>
            <div class="form-group row">
                <input class="form-control" type="text" name="precio" id="precio" placeholder="Precio">
            </div>
            <div class="form-group row">
                <input class="btn btn-success" type="button" name="newproducto" id="newproducto" value="Guardar">
            </div>
        </form>
    </div>
    <div class="col-md-8">
    <table class="table table-hover display" id="table_id">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>PRODUCTO</th>
        <th>STOCK</th>
        <th>PRECIO</th>
        <th>ACCION</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php 
      require 'config/config_db.php';
      $connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
      $sql = "SELECT * FROM tproductos WHERE estatus = 1";
      $query = mysqli_query($connect,$sql);
      mysqli_close($connect);
      while ($row = mysqli_fetch_array($query)) {
          echo '<tr>
                <td>'.$row['idproducto'].'</td>
                <td>'.$row['producto'].'</td>
                <td>'.$row['stock'].'</td>
                <td>'.number_format($row['precio'],2,',','.').' BsS</td>
                <td><div class="dropdown">
                <button type="button" class="btn btn-outline-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  Acciones
                </button>
                <div class="dropdown-menu">
                  <a onclick="return verproducto('.$row['idproducto'].')" data-toggle="modal" data-target="#myModal" class="dropdown-item" href="#">Ver</a>
                  <a onclick="return editproducto('.$row['idproducto'].')" data-toggle="modal" data-target="#myModal2" class="dropdown-item" href="#">Editar</a>
                  <a onclick="return disabledproducto('.$row['idproducto'].')" class="dropdown-item" href="#">Desactivar</a>
                </div>
              </div></td>
                </tr>';
      }
      
      
      ?>
      
    </tbody>
  </table>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ver</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
            <label for="producto">Producto:</label>
                <input class="form-control" type="text" name="producto" id="productover" placeholder="Producto" readOnly>
                <input class="form-control" type="hidden" name="idproducto" id="idproductover" placeholder="Producto" readOnly>
            </div>
            <div class="form-group">
            <label for="stock">Stock:</label>
                <input class="form-control" type="text" name="stock" id="stockver" placeholder="Stock" readOnly>
            </div>
            <div class="form-group">
            <label for="precio">Precio:</label>
                <input class="form-control" type="text" name="precio" id="preciover" placeholder="Precio" readOnly>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
</div>

<div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form id="form-edit">
            <div class="form-group">
                <input class="form-control" type="text" name="productoedit" id="productoedit" placeholder="Producto">
                <input class="form-control" type="hidden" name="idproductoedit" id="idproductoedit" placeholder="Producto">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="stockedit" id="stockedit" placeholder="Stock">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="precioedit" id="precioedit" placeholder="Precio">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="button" name="guardar" id="modificar" value="Modificar">
            </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
</div>
<script src="assets/js/jquery.bootstrap-growl.js"></script>
<script src="assets/js/verproductos.js"></script>
<script src="assets/js/editproducto.js"></script>
<script src="assets/js/disabledproducto.js"></script>
<script src="assets/js/newproducto.js"></script>

<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
});
</script>

</body>
</html>
