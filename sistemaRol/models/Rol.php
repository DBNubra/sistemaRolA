<?php
require_once __DIR__ . '/../config/database.php';

class Rol
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function crear($data)
    {
        $stmt = $this->db->prepare("INSERT INTO rol (
            mes, hora25, hora50, hora100, bono, sueldo, total_ingreso, iess, multas, atrasos, alimentacion, anticipos, otros, total_egreso, total_pagar, fecha_registro, ci_empleado
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['mes'],
            $data['hora25'],
            $data['hora50'],
            $data['hora100'],
            $data['bono'],
            $data['sueldo'],
            $data['total_ingreso'],
            $data['iess'],
            $data['multas'],
            $data['atrasos'],
            $data['alimentacion'],
            $data['anticipos'],
            $data['otros'],
            $data['total_egreso'],
            $data['total_pagar'],
            $data['fecha_registro'],
            $data['ci_empleado']
        ]);
    }

    public function obtenerTodos()
    {
        $sql = "SELECT r.*, e.nombre, e.apellido 
                FROM rol r
                INNER JOIN empleado e ON r.ci_empleado = e.ci_empleado";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->db->prepare("SELECT r.*, e.nombre, e.apellido 
                                    FROM rol r
                                    INNER JOIN empleado e ON r.ci_empleado = e.ci_empleado
                                    WHERE r.id_rol = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data)
    {
        $stmt = $this->db->prepare("UPDATE rol SET 
            mes=?, hora25=?, hora50=?, hora100=?, bono=?, sueldo=?, total_ingreso=?, iess=?, multas=?, atrasos=?, alimentacion=?, anticipos=?, otros=?, total_egreso=?, total_pagar=?, fecha_registro=?, ci_empleado=?
            WHERE id_rol=?");
        return $stmt->execute([
            $data['mes'],
            $data['hora25'],
            $data['hora50'],
            $data['hora100'],
            $data['bono'],
            $data['sueldo'],
            $data['total_ingreso'],
            $data['iess'],
            $data['multas'],
            $data['atrasos'],
            $data['alimentacion'],
            $data['anticipos'],
            $data['otros'],
            $data['total_egreso'],
            $data['total_pagar'],
            $data['fecha_registro'],
            $data['ci_empleado'],
            $data['id_rol']
        ]);
    }

    public function eliminar($id)
    {
        $stmt = $this->db->prepare("DELETE FROM rol WHERE id_rol = ?");
        return $stmt->execute([$id]);
    }
}
?>