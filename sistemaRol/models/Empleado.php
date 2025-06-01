<?php
require_once __DIR__ . '/../config/database.php';

class Empleado
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

   public function crear($data)
{
    try {
        // Verifica si id_departamento está presente en los datos
        if (!isset($data['id_departamento'])) {
            throw new Exception("El campo id_departamento es obligatorio.");
        }
        
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM departamento WHERE id_departamento = ?");
        $stmt->execute([$data['id_departamento']]);
        $count = $stmt->fetchColumn();
        
        if ($count == 0) {
            throw new Exception("El departamento con id {$data['id_departamento']} no existe.");
        }

        $stmt = $this->db->prepare("INSERT INTO empleado (ci_empleado, nombre, apellido, telefono, direccion, correo, id_departamento) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['ci_empleado'],
            $data['nombre'],
            $data['apellido'],
            $data['telefono'],
            $data['direccion'],
            $data['correo'],
            $data['id_departamento']
        ]);
    } catch (Exception $e) {
        die("Error al crear empleado: " . $e->getMessage());
    }
}
    public function obtenerTodos()
    {
        $sql = "SELECT e.ci_empleado, e.nombre, e.apellido, e.telefono, e.correo,
                   e.direccion, e.id_departamento, d.nombre AS departamento_nombre,
                   d.area
            FROM empleado e
            INNER JOIN departamento d ON e.id_departamento = d.id_departamento";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare(
            "SELECT e.ci_empleado, e.nombre, e.apellido, e.telefono, e.correo,
                e.direccion, d.nombre AS departamento_nombre,
                d.area, d.id_departamento
            FROM empleado e
            INNER JOIN departamento d ON e.id_departamento = d.id_departamento
            WHERE e.ci_empleado = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data)
    {
        $stmt = $this->db->prepare("UPDATE empleado 
                                    SET nombre=?, apellido=?, telefono=?, direccion=?, correo=?, id_departamento=? 
                                    WHERE ci_empleado=?");
        return $stmt->execute([
            $data['nombre'], 
            $data['apellido'], 
            $data['telefono'], 
            $data['direccion'], 
            $data['correo'], 
            $data['id_departamento'], 
            $data['ci_empleado']
        ]);
    }
    public function eliminar($id)
    {
        // Elimina los roles asociados primero
        $stmtRol = $this->db->prepare("DELETE FROM rol WHERE ci_empleado = ?");
        $stmtRol->execute([$id]);

        // Ahora elimina el empleado
        $stmt = $this->db->prepare("DELETE FROM empleado WHERE ci_empleado = ?");
        return $stmt->execute([$id]);
    }
    public function obtenerDepartamentos()
{
    $stmt = $this->db->query("SELECT * FROM departamento");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
