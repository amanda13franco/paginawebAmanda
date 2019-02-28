<?php 
    session_start();
    $db=mysqli_connect('127.0.0.1','root','','gelatinas');
    $sabor="";
    $molde="";
    $extras="";
    $litros=1;
    $tipo="";
    $id=0;
    $seleccionar=false;
 
/**Metodo guardar */
if(isset($_POST['guardar']))
    {
        $sabor=$_POST['sabor'];
        $molde=$_POST['molde'];
        $litros=$_POST['litros'];
        $tipo=$_POST['tipo'];
        $extras=$_POST['extras'];

        mysqli_query($db,"INSERT INTO g_gelas VALUES (null,'{$sabor}','{$molde}','{$litros}','{$tipo}','{$extras}')");
        $_SESSION['mensaje']="Registro guardado";
        header('location:gelatinas.php');
    }

    /*Metodo actualizar*/ 
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $sabor=$_POST['sabor'];
        $molde=$_POST['molde'];
        $litros=$_POST['litros'];
        $tipo=$_POST['tipo'];
        $extras=$_POST['extras'];

        mysqli_query($db,"UPDATE g_gelas set sabor='$sabor',molde='$molde',litros='$litros',tipo='$tipo',extra='$extras' where id_gelatina=$id");

        $_SESSION['mensaje']="Registro actualizado";
        header('location:gelatinas.php');
    }

    /*Metodo eliminar  */
    if(isset($_POST['eliminar'])){
        $id=$_POST['id'];
        $sabor=$_POST['sabor'];
        $molde=$_POST['molde'];
        $litros=$_POST['litros'];
        $tipo=$_POST['tipo'];
        $extras=$_POST['extras'];

        mysqli_query($db,"delete from g_gelas where id_gelatina=$id");

        $_SESSION['mensaje']="Registro eliminado";
        header('location:gelatinas.php');
    }
    ?>