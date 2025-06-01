<?php
require_once '../../models/Empleado.php';
$empleado = new Empleado;
$data = [
    'ci_empleado' => '',
    'nombre' => '', 
    'apellido' => '', 
    'telefono' => '', 
    'direccion' => '', 
    'correo' => '', 
    'id_departamento' => ''
];
if(isset($_GET['id'])){
  $data=$empleado-> obtenerPorId(id: $_GET['id'])?? $data;
}
require_once '../../models/Departamento.php';

$departamentoModel= new Departamento();
$departamentos=$departamentoModel->obtenerTodos();


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario Empleado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* Fondo con figuras geométricas */
    body {
      
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #ffffff;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(240)'%3E%3Cstop offset='0' stop-color='%23ffffff'/%3E%3Cstop offset='1' stop-color='%234FE'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='540' height='450' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
      background-attachment: fixed;
      background-size: cover;
  }

    /* Tarjeta con efecto de vidrio esmerilado */
    .card {
      border-radius: 1rem;
      box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
      background-color: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
    }

    .card-title {
      font-weight: 600;
      color: #2c3e50;
    }

    label {
      font-weight: 500;
    }

    .btn-custom {
      background-color: #6a11cb;
      border: none;
    }

    .btn-custom:hover {
      background-color: #4a0da4;
    }
  </style>
</head>
<body>

  <div class="container p-4">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card p-4">
          <a href="listar.php" class="btn btn-custom text-white mb-2">
            <i class="bi bi-list-ul me-1"></i>Ver Empleados
          </a>
          <h4 class="card-title text-center mb-4"><i class="bi bi-person"></i> <?= isset($_GET['id']) ? 'Editar' : 'Registrar' ?> Empleado</h4>
          <form action="../../controllers/EmpleadoController.php" method="POST">
            <!-- Campo Cédula -->
            <div class="mb-3">
              <label for="ci_empleado" class="form-label"><i class="bi bi-credit-card-2-front me-2"></i>Cédula del Empleado</label>
              <input type="text" class="form-control" id="ci_empleado" name="ci_empleado" value="<?= htmlspecialchars($data['ci_empleado']) ?>" required <?= isset($_GET['id']) ? 'readonly' : '' ?>>
            </div>
            <!-- Campo Nombre -->
            <div class="mb-3">
              <label for="nombreEmpleado" class="form-label"><i class="bi bi-person-lines-fill me-2"></i>Nombre del Empleado</label>
              <input type="text" class="form-control" id="nombreEmpleado" name="nombre" value="<?= htmlspecialchars($data['nombre']) ?>" required>
            </div>
            <!-- Campo Apellido -->
            <div class="mb-3">
              <label for="apellidoEmpleado" class="form-label"><i class="bi bi-person-lines-fill me-2"></i>Apellido del Empleado</label>
              <input type="text" class="form-control" id="apellidoEmpleado" name="apellido" value="<?= htmlspecialchars($data['apellido']) ?>" required>
            </div>
            <!-- Campo Teléfono -->
            <div class="mb-3">
              <label for="telefonoEmpleado" class="form-label"><i class="bi bi-telephone me-2"></i>Teléfono</label>
              <input type="text" class="form-control" id="telefonoEmpleado" name="telefono" value="<?= htmlspecialchars($data['telefono']) ?>" required>
            </div>
            <!-- Campo Dirección -->
            <div class="mb-3">
              <label for="direccionEmpleado" class="form-label"><i class="bi bi-house-door me-2"></i>Dirección</label>
              <input type="text" class="form-control" id="direccionEmpleado" name="direccion" value="<?= htmlspecialchars($data['direccion']) ?>" required>
            </div>
            <!-- Campo Correo -->
            <div class="mb-3">
              <label for="correoEmpleado" class="form-label"><i class="bi bi-envelope me-2"></i>Correo Electrónico</label>
              <input type="email" class="form-control" id="correoEmpleado" name="correo" value="<?= htmlspecialchars($data['correo']) ?>" required>
            </div>
            <!-- Campo Departamento -->
            <div class="mb-3">
              <label for="id_departamento" class="form-label"><i class="bi bi-building me-2"></i>Departamento</label>
              <select class="form-control" id="id_departamento" name="id_departamento" required>
                <option value="">Seleccione un departamento</option>
                <?php foreach ($departamentos as $d): ?>
                  <option value="<?= $d['id_departamento'] ?>" <?= $d['id_departamento'] == $data['id_departamento'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($d['nombre'] . ' - ' . $d['ubicacion']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php if (isset($_GET['id'])): ?>
              <input type="hidden" name="accion" value="editar">
            <?php endif; ?>
            <!-- Botón Enviar -->
            <div class="d-grid">
              <button type="submit" class="btn btn-custom text-white">
                <i class="bi bi-save me-2"></i>Guardar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
