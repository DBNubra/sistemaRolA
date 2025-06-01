<?php
require_once '../../models/Rol.php';
$rol = new Rol();
$roles = $rol->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Roles de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            background-color: #ffffff;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(240)'%3E%3Cstop offset='0' stop-color='%23ffffff'/%3E%3Cstop offset='1' stop-color='%234FE'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='540' height='450' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
      background-attachment: fixed;
      background-size: cover;
        }
        .card {
            background-color: rgba(255,255,255,0.85);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
        }
        .btn-custom {
            background-color: #6a11cb;
            border: none;
        }
        .btn-custom:hover {
            background-color: #4a0da4;
        }
        .btn-custom1 {
            background-color:rgb(17, 203, 33);
            border: none;
        }
        .btn-custom1:hover {
            background-color:rgb(1, 102, 34);
        }
        .title-icon {
            font-size: 1.5rem;
            color: #2c3e50;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12" style="max-width: 120vw;">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">
                        <i class="bi bi-cash-coin title-icon me-2"></i>
                        Roles de Pago
                    </h4>
                    <a href="../../controllers/ReporteRol.php" target="_blank" class="btn btn-custom1 text-white">
                        <i class="bi bi-printer me-1"></i>Imprimir
                    </a>    
                    <a href="Formulario.php" class="btn btn-custom text-white">
                        <i class="bi bi-plus-lg me-1"></i>Nuevo Rol de Pago
                    </a>
                    
                </div>
                <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-success">
                        <?php
                        if ($_GET['msg'] === 'creado') echo "Rol de pago creado correctamente.";
                        if ($_GET['msg'] === 'actualizado') echo "Rol de pago actualizado correctamente.";
                        if ($_GET['msg'] === 'eliminado') echo "Rol de pago eliminado correctamente.";
                        ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Mes</th>
                                <th>Empleado</th>
                                <th>Horas 25%</th>
                                <th>Horas 50%</th>
                                <th>Horas 100%</th>
                                <th>Bono</th>
                                <th>Sueldo</th>
                                <th>Total Ingreso</th>
                                <th>IESS</th>
                                <th>Multas</th>
                                <th>Atrasos</th>
                                <th>Alimentación</th>
                                <th>Anticipos</th>
                                <th>Otros</th>
                                <th>Total Egreso</th>
                                <th>Total a Pagar</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $r): ?>
                                <tr>
                                    <td><?= $r['id_rol'] ?></td>
                                    <td><?= $r['mes'] ?></td>
                                    <td><?= $r['ci_empleado'] ?> - <?= $r['nombre'] ?> <?= $r['apellido'] ?></td>
                                    <td><?= $r['hora25'] ?></td>
                                    <td><?= $r['hora50'] ?></td>
                                    <td><?= $r['hora100'] ?></td>
                                    <td><?= $r['bono'] ?></td>
                                    <td><?= $r['sueldo'] ?></td>
                                    <td><?= $r['total_ingreso'] ?></td>
                                    <td><?= $r['iess'] ?></td>
                                    <td><?= $r['multas'] ?></td>
                                    <td><?= $r['atrasos'] ?></td>
                                    <td><?= $r['alimentacion'] ?></td>
                                    <td><?= $r['anticipos'] ?></td>
                                    <td><?= $r['otros'] ?></td>
                                    <td><?= $r['total_egreso'] ?></td>
                                    <td><?= $r['total_pagar'] ?></td>
                                    <td><?= $r['fecha_registro'] ?></td>
                                    <td>
                                        <a href="Formulario.php?id=<?= $r['id_rol'] ?>" class="btn btn-warning btn-sm me-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="../../controllers/RolController.php?accion=eliminar&id=<?= $r['id_rol'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este rol de pago?');">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                       <a href="../../controllers/ReporteRol.php?id=<?= $r['id_rol'] ?>" class="btn btn-danger btn-sm" >
                                            <i class="bi bi-print"></i>Rol Individual
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (empty($roles)): ?>
                                <tr>
                                    <td colspan="19" class="text-center">No hay roles de pago registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>