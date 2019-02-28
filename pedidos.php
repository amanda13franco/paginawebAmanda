<?php include('phpcode/php_code3.php'); ?>
<?php
$seleccionar=false;
if(isset($_GET['sele'])){
    $id=$_GET['sele'];
    $seleccionar=true;
    $record=mysqli_query($db,"SELECT id_pedido,concat(nombre,' ',apellidop,' ',apelliom) as 'Cliente',concat('sabor: ',sabor,' molde: ',molde,' de ',litros,' litros') as 'Gelatina',fecha,monto
    FROM g_pedidos gp inner join g_clientes gc on gp.id_cliente=gc.id_cliente inner join
    g_gelas gg on gp.id_gelatina=gg.id_gelatina where id_pedido=$id");

    if(@count($record)==1){
        $n=mysqli_fetch_array($record);
        $cliente=$n['Cliente'];
        $gelatina=$n['Gelatina'];
        $fecha=$n['fecha'];
        $monto=$n['monto'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Pedidos</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<form method="post" action="pedidos.php">
<label>CRUD Pedidos</label><br>
<label>Ingresa los datos que se te piden (*campo obligatorio)</label><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label>* Selecciona un cliente:</label><br>
<?php 
$query="SELECT id_cliente,nombre,apellidop,apelliom FROM g_clientes"; 
$r=mysqli_query($db,$query);
$lista1="<select name='lista1'>\n<option selected>Click aqui</option>"; 
while($registro=mysqli_fetch_row($r)) 
{ 
$lista1.="\n<option value='".$registro[0]."'>".$registro[1]." ".$registro[2]." ".$registro[3]."</option>"; 
} 
$lista1.="\n</select><br><br>"; 
echo $lista1; 
?>
<label>Cliente:</label>
<input type="text" name="Cliente" value="<?php echo $cliente; ?>"><br><br>

<label>* Selecciona una gelatina:</label><br>
<?php 
$query="SELECT id_gelatina,sabor,molde,litros,tipo,extra FROM g_gelas"; 
$r=mysqli_query($db,$query);
$lista2="<select name='gelatina'>\n<option selected>Click aqui</option>"; 
while($registro=mysqli_fetch_row($r)) 
{ 
$lista2.="\n<option value='".$registro[0]."'>sabor:".$registro[1]." molde:".$registro[2]." de ".$registro[3]." litros</option>"; 
} 
$lista2.="\n</select><br><br>"; 
echo $lista2; 
?>
<label>Gelatina:</label>
<input type="text" name="Gelatina" id="Gelatina" value="<?php echo $gelatina; ?>"><br><br>
<label>Fecha:</label><br>
<input type="text" name="fecha" value="<?php echo $fecha; ?>"><br><br>
<label>Monto:</label><br>
<input type="text" name="monto" value="<?php echo $monto; ?>"><br><br>
<?php if($seleccionar == true): ?>
<button class="btn" type="submit" name="update">Actualizar</button>
<button class="btn" type="submit" name="eliminar">Eliminar</button><br>
<?php else: ?>
<button class="btn" type="submit" name="guardar">Guardar</button><br>
<?php endif ?>
<a href="index.php">Regresar</a>

<?php $results = mysqli_query($db,"SELECT id_pedido,concat(nombre,' ',apellidop,' ',apelliom) as 'Cliente',
concat('sabor: ',sabor,' molde: ',molde,' de ',litros,' litros') as 'Gelatina',fecha,monto
FROM g_pedidos gp inner join g_clientes gc on gp.id_cliente=gc.id_cliente inner join
g_gelas gg on gp.id_gelatina=gg.id_gelatina");
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
<th>Cliente</th>
<th>Gelatina</th>
<th>Fecha</th>
<th>Monto</th>
</tr>
</thead>

<?php $results = mysqli_query($db,"SELECT id_pedido,concat(nombre,' ',apellidop,' ',apelliom) as 'Cliente',
concat('sabor: ',sabor,' molde: ',molde,' de ',litros,' litros') as 'Gelatina',fecha,monto
FROM g_pedidos gp inner join g_clientes gc on gp.id_cliente=gc.id_cliente inner join
g_gelas gg on gp.id_gelatina=gg.id_gelatina");
while ($row = mysqli_fetch_array($results)){ ?>
<tr class="arriba">
<td><?php echo $row['Cliente']; ?></td>
<td><?php echo $row['Gelatina']; ?></td>
<td><?php echo $row['fecha']; ?></td>
<td><?php echo $row['monto']; ?></td>
<td><a href="pedidos.php?sele=<?php echo $row['id_pedido']; ?>" class="sele_btn" > Seleccionar</a></td>
</tr>
<?php }}?>

</table>
</body>
</html>