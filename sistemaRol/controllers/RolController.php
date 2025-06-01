
<?php
require_once '../models/Rol.php';

$rol = new Rol();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = [
        'mes'            => $_POST['mes'],
        'hora25'         => $_POST['hora25'],
        'hora50'         => $_POST['hora50'],
        'hora100'        => $_POST['hora100'],
        'bono'           => $_POST['bono'],
        'sueldo'         => $_POST['sueldo'],
        'total_ingreso'  => $_POST['total_ingreso'],
        'iess'           => $_POST['iess'],
        'multas'         => $_POST['multas'],
        'atrasos'        => $_POST['atrasos'],
        'alimentacion'   => $_POST['alimentacion'],
        'anticipos'      => $_POST['anticipos'],
        'otros'          => $_POST['otros'],
        'total_egreso'   => $_POST['total_egreso'],
        'total_pagar'    => $_POST['total_pagar'],
        'fecha_registro' => $_POST['fecha_registro'],
        'ci_empleado'    => $_POST['ci_empleado']
    ];

    if (isset($_POST['id_rol_pago']) && !empty($_POST['id_rol_pago'])) {
        // Actualizar
        $data['id_rol_pago'] = $_POST['id_rol_pago'];
        $rol->actualizar($data);
        header('Location: ../views/RolPago/listar.php?msg=actualizado');
        exit;
    } else {
        // Crear
        $rol->crear($data);
        header('Location: ../views/RolPago/listar.php?msg=creado');
        exit;
    }
}

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $rol->eliminar($_GET['id']);
    header('Location: ../views/RolPago/listar.php?msg=eliminado');
    exit;
}
?>