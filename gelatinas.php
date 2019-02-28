<?php include('phpcode/php_code2.php'); ?>
<?php
$seleccionar=false;
if(isset($_GET['sele'])){
    $id=$_GET['sele'];
    $seleccionar=true;
    $record=mysqli_query($db,"SELECT * FROM g_gelas where id_gelatina=$id");

    if(@count($record)==1){
        $n=mysqli_fetch_array($record);
        $sabor=$n['sabor'];
        $molde=$n['molde'];
        $litros=$n['litros'];
        $tipo=$n['tipo'];
        $extras=$n['extra'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Gelatinas</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
	$(document).ready(function()
		{
		$('#numrango').change(function() {
		$('#litros').val($(this).val());
		});
	});
</script>
<form method="post" action="gelatinas.php">
<label>CRUD Gelatinas</label><br>
<label>Ingresa los datos que se te piden (*campo obligatorio)</label><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label>* Sabor:</label><br>
<input type="text" name="sabor" value="<?php echo $sabor; ?>"><br>
<label>* Molde:</label><br>
<input type="text" name="molde" value="<?php echo $molde; ?>"><br>
<label>* Litros:</label><br>
<input id="numrango" type="range" name="numrango" value="<?php echo $litros; ?>" min="1" max="10" step="1">
<input type="text" name="litros" id="litros" value="<?php echo $litros; ?>"><br>
<label>* Tipo:</label><br>
<?php if($tipo=="Agua"):?>
<select name="tipo">
<option value="elige">Elige una opcion</option>
<option value="Leche">Leche</option>
<option value="Agua" selected>Agua</option>
<option value="Yogurt">Yogurt</option>
</select><br>
<?php elseif($tipo=="Leche"):?>
<select name="tipo">
<option value="elige">Elige una opcion</option>
<option value="Leche" selected>Leche</option>
<option value="Agua">Agua</option>
<option value="Yogurt">Yogurt</option>
</select><br>
<?php elseif($tipo=="Yogurt"):?>
<select name="tipo">
<option value="elige">Elige una opcion</option>
<option value="Leche">Leche</option>
<option value="Agua">Agua</option>
<option value="Yogurt" selected>Yogurt</option>
</select><br>
<?php else:?>
<select name="tipo">
<option value="elige">Elige una opcion</option>
<option value="Leche">Leche</option>
<option value="Agua">Agua</option>
<option value="Yogurt">Yogurt</option>
</select><br>
<?php endif?>
<label>* Extra:</label><br>
<textarea name="extras" rows="10" cols="40" value="<?php echo $extras; ?>"><?php echo $extras; ?></textarea><br>

<?php if($seleccionar == true): ?>
<button class="btn" type="submit" name="update">Actualizar</button>
<button class="btn" type="submit" name="eliminar">Eliminar</button><br>
<?php else: ?>
<button class="btn" type="submit" name="guardar">Guardar</button><br>
<?php endif ?>

<a href="index.php">Regresar</a>

<?php if (isset($_SESSION['mensaje2'])){
?>
<div class="mensaje2">
<?php
$mensaje=$_SESSION['mensaje2'];
echo $mensaje;
?>
</div>
<?php } ?>

<?php $results = mysqli_query($db,"SELECT * FROM g_gelas");
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
<th>Sabor</th>
<th>Molde</th>
<th>Litros</th>
<th>Tipo</th>
<th>Extra</th>
</tr>
</thead>

<?php $results = mysqli_query($db,"SELECT * FROM g_gelas");
while ($row = mysqli_fetch_array($results)){ ?>
<tr class="arriba">
<td><?php echo $row['sabor']; ?></td>
<td><?php echo $row['molde']; ?></td>
<td><?php echo $row['litros']; ?></td>
<td><?php echo $row['tipo']; ?></td>
<td><?php echo $row['extra']; ?></td>
<td><a href="gelatinas.php?sele=<?php echo $row['id_gelatina']; ?>" class="sele_btn" > Seleccionar</a></td>
</tr>
<?php }}?>

</table>
</body>
</html>