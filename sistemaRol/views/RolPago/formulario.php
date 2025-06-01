<?php
require_once '../../models/Empleado.php';
require_once '../../models/Rol.php';

$empleado = new Empleado();
$empleados = $empleado->obtenerTodos();

$rol = new Rol();
$data = [
    'id_rol_pago'    => '',
    'mes'            => '',
    'hora25'         => '',
    'hora50'         => '',
    'hora100'        => '',
    'bono'           => '',
    'sueldo'         => '',
    'total_ingreso'  => '',
    'iess'           => '',
    'multas'         => '',
    'atrasos'        => '',
    'alimentacion'   => '',
    'anticipos'      => '',
    'otros'          => '',
    'total_egreso'   => '',
    'total_pagar'    => '',
    'fecha_registro' => '',
    'ci_empleado'    => ''
];

if (isset($_GET['id'])) {
    $data = $rol->obtenerPorId($_GET['id']) ?? $data;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= empty($data['id_rol_pago']) ? 'Registrar' : 'Editar' ?> Rol de Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
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
        .title-icon {
            font-size: 1.5rem;
            color: #2c3e50;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">
                        <i class="bi bi-cash-coin title-icon me-2"></i>
                        <?= empty($data['id_rol_pago']) ? 'Registrar' : 'Editar' ?> Rol de Pago
                    </h4>
                    <a href="listar.php" class="btn btn-secondary">Volver</a>
                </div>
                <form id="rolPagos" action="../../controllers/RolController.php" method="POST">
                    <?php if (!empty($data['id_rol_pago'])): ?>
                        <input type="hidden" name="id_rol_pago" value="<?= $data['id_rol_pago'] ?>">
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mes" class="form-label">Mes</label>
                            <select name="mes" id="mes" class="form-select" required>
                                <option value="">Seleccione un mes</option>
                                <?php
                                $meses = [
                                    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                                    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
                                ];
                                foreach ($meses as $mes): ?>
                                    <option value="<?= $mes ?>" <?= $data['mes'] == $mes ? 'selected' : '' ?>><?= $mes ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ci_empleado" class="form-label">Empleado</label>
                            <select name="ci_empleado" id="ci_empleado" class="form-select" required>
                                <option value="">Seleccione un empleado</option>
                                <?php foreach ($empleados as $e): ?>
                                    <option value="<?= $e['ci_empleado'] ?>" <?= $data['ci_empleado'] == $e['ci_empleado'] ? 'selected' : '' ?>>
                                        <?= $e['ci_empleado'] ?> - <?= $e['nombre'] ?> <?= $e['apellido'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Horas 25% -->
                        <div class="col-md-4 mb-3">
                            <label for="horas25" class="form-label">Horas 25%</label>
                            <input type="number" step="0.01" class="form-control" id="horas25" value="<?= $data['hora25'] ?>" required>
                            <input type="hidden" name="hora25" id="hora25" value="">
                        </div>
                        <!-- Horas 50% -->
                        <div class="col-md-4 mb-3">
                            <label for="horas50" class="form-label">Horas 50%</label>
                            <input type="number" step="0.01" class="form-control" id="horas50" value="<?= $data['hora50'] ?>" required>
                            <input type="hidden" name="hora50" id="hora50" value="">
                        </div>
                        <!-- Horas 100% -->
                        <div class="col-md-4 mb-3">
                            <label for="horas100" class="form-label">Horas 100%</label>
                            <input type="number" step="0.01" class="form-control" id="horas100" value="<?= $data['hora100'] ?>" required>
                            <input type="hidden" name="hora100" id="hora100" value="">
                        </div>
                        <!-- Bono -->
                        <div class="col-md-4 mb-3">
                            <label for="bonos" class="form-label">Bono</label>
                            <input type="number" step="0.01" class="form-control" id="bonos" value="<?= $data['bono'] ?>" required>
                            <input type="hidden" name="bono" id="bono" value="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sueldo" class="form-label">Sueldo</label>
                            <input type="number" step="0.01" class="form-control" name="sueldo" id="sueldo" value="<?= $data['sueldo'] ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="total_ingreso" class="form-label">Total Ingreso</label>
                            <input type="number" step="0.01" class="form-control" name="total_ingreso" id="total_ingresos" value="<?= $data['total_ingreso'] ?>" readonly required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="iess" class="form-label">IESS</label>
                            <input type="number" step="0.01" class="form-control" name="iess" id="iess" value="<?= $data['iess'] ?>" placeholder="9.45%" readonly required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="multas" class="form-label">Multas</label>
                            <input type="number" step="0.01" class="form-control" name="multas" id="multas" value="<?= $data['multas'] ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="atrasos" class="form-label">Atrasos</label>
                            <input type="number" step="0.01" class="form-control" name="atrasos" id="atrasos" value="<?= $data['atrasos'] ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="alimentacion" class="form-label">Alimentación</label>
                            <input type="number" step="0.01" class="form-control" name="alimentacion" id="alimentacion" value="<?= $data['alimentacion'] ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="anticipos" class="form-label">Anticipos</label>
                            <input type="number" step="0.01" class="form-control" name="anticipos" id="anticipos" value="<?= $data['anticipos'] ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="otros" class="form-label">Otros</label>
                            <input type="number" step="0.01" class="form-control" name="otros" id="otros" value="<?= $data['otros'] ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="total_egreso" class="form-label">Total Egreso</label>
                            <input type="number" step="0.01" class="form-control" name="total_egreso" id="total_egresos" value="<?= $data['total_egreso'] ?>" readonly required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="total_pagar" class="form-label">Total a Pagar</label>
                            <input type="number" step="0.01" class="form-control" name="total_pagar" id="total_neto" value="<?= $data['total_pagar'] ?>" readonly required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                            <input type="date" class="form-control" name="fecha_registro" id="fecha_registro" value="<?= $data['fecha_registro'] ?>" required>
                        </div>
                    </div>
                    <!-- Campos ocultos para cálculos -->
                    <input type="hidden" name="temp_total_25" id="temp_total_25" />
                    <input type="hidden" name="temp_total_50" id="temp_total_50" />
                    <input type="hidden" name="temp_total_100" id="temp_total_100" />
                    <input type="hidden" name="temp_total_ingreso" id="temp_total_ingreso" />
                    <input type="hidden" name="temp_total_egreso" id="temp_total_egreso" />
                    <input type="hidden" name="temp_iess" id="temp_iess" />
                    <input type="hidden" name="temp_multas" id="temp_multas" />
                    <input type="hidden" name="temp_atrasos" id="temp_atrasos" />
                    <input type="hidden" name="temp_anticipos" id="temp_anticipos" />
                    <input type="hidden" name="temp_alimentacion" id="temp_alimentacion" />
                    <input type="hidden" name="temp_otros" id="temp_otros" />
                    <input type="hidden" name="temp_total_neto" id="temp_total_neto" />
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-custom text-white me-2">Calcular y Guardar</button>
                        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="app.js"></script>
</body>
</html>