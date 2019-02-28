<?php include('phpcode/php_code1.php'); ?>
<?php
$seleccionar=false;
if(isset($_GET['sele'])){
    $id=$_GET['sele'];
    $seleccionar=true;
    $record=mysqli_query($db,"SELECT * FROM g_clientes where id_cliente=$id");

    if(@count($record)==1){
        $n=mysqli_fetch_array($record);
        $nombre=$n['nombre'];
        $apaP=$n['apellidop'];
        $amaM=$n['apelliom'];
        $telefono=$n['telefono'];
        $direccion=$n['direccion'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Clientes</title>
<link rel="stylesheet" type="text/css" href="estilos/style1.css">
</head>
<body>
<form method="post" action="clientes.php">
<label>CRUD Clientes</label><br>
<label>Ingresa los datos que se te piden (*campo obligatorio)</label><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label>* Nombre:</label><br>
<input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
<label>* Apellido Paterno:</label><br>
<input type="text" name="apaP" value="<?php echo $apaP; ?>"><br>
<label>* Apellido Materno:</label><br>
<input type="text" name="amaM" value="<?php echo $amaM; ?>"><br>
<label>* Teléfono:</label><br>
<input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>
<label>* Dirección:</label><br>
<input type="text" name="direccion" value="<?php echo $direccion; ?>"><br><br>

<?php if($seleccionar == true): ?>
<button class="btn" type="submit" name="update">Actualizar</button>
<button class="btn" type="submit" name="eliminar">Eliminar</button><br>
<?php else: ?>
<button class="btn" type="submit" name="guardar">Guardar</button><br>
<?php endif ?>
<a href="index.php">Regresar</a>


<?php if (isset($_SESSION['mensaje'])){
?>
<div class="mensaje">
<?php
$mensaje=$_SESSION['mensaje'];
echo $mensaje;
?>
</div>
<?php } ?>

<?php $results = mysqli_query($db,"SELECT * FROM g_clientes");
$row=mysqli_fetch_array($results);
if(is_null($row)){
?>
<div class="vacio">Sin registros </div>
<?php
}else{
?>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Teléfono</th>
<th>Dirección</th>
</tr>
</thead>

<?php $results = mysqli_query($db,"SELECT * FROM g_clientes");
while ($row = mysqli_fetch_array($results)){ ?>
<tr class="arriba">
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['apellidop']; ?></td>
<td><?php echo $row['apelliom']; ?></td>
<td><?php echo $row['telefono']; ?></td>
<td><?php echo $row['direccion']; ?></td>
<td><a href="clientes.php?sele=<?php echo $row['id_cliente']; ?>" class="sele_btn" > Seleccionar</a></td>
</tr>
<?php }}?>
</table>
</body>
</html>