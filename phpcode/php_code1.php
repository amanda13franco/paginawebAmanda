<?php 
    session_start();
    $db=mysqli_connect('127.0.0.1','root','','gelatinas');
   $nombre="";
    $apaP="";
    $amaM="";
    $telefono=0;
    $direccion="";
    $id=0;
    $seleccionar=false;
  
/**Metodo guardar */
if(isset($_POST['guardar']))
    {
        $nombre=$_POST['nombre'];
        $apaP=$_POST['apaP'];
        $amaM=$_POST['amaM'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        mysqli_query($db,"INSERT INTO g_clientes VALUES (null,'{$nombre}','{$apaP}','{$amaM}','{$telefono}','{$direccion}')");
        $_SESSION['mensaje']="Registro guardado{$nombre}";
        header('location:clientes.php');
    }

    /*Metodo actualizar */
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apaP=$_POST['apaP'];
        $amaM=$_POST['amaM'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        mysqli_query($db,"UPDATE g_clientes set nombre='$nombre',apellidop='$apaP',apelliom='$amaM',telefono='$telefono',direccion='$direccion' where id_cliente=$id");

        $_SESSION['mensaje']="Registro actualizado";
        header('location:clientes.php');
    }

    /*Metodo eliminar */
    if(isset($_POST['eliminar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apaP=$_POST['apaP'];
        $amaM=$_POST['amaM'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];

        mysqli_query($db,"delete from g_clientes where id_cliente=$id");

        $_SESSION['mensaje']="Registro eliminado";
        header('location:clientes.php');
    }
    ?>