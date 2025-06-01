<?php
require_once __DIR__.'/../models/Departamento.php';

$departamento = new Departamento();

if ($_SERVER ['REQUEST_METHOD']==='POST'){
    if (isset($_POST['accion']) && $_POST ['accion']==='editar'){
        $departamento -> actualizar($_POST);
        header("Location:../views/Departamento/listar.php");
    }else{
        $departamento->crear ($_POST);
        header("Location:../views/Departamento/listar.php");
        exit;
    }
    } elseif (isset($_GET['eliminar'])){
        var_dump($_GET['eliminar']);
        $departamento -> eliminar($_GET['eliminar']);
        header("Location:../views/Departamento/listar.php");   
}

?>