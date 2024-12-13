<?php

require_once "conexion.php";

class ModeloClientes {

    /*=============================================
    Mostrar todos los registros
    =============================================*/
    static public function index($tabla) {
        try {
            // Verificar si la tabla está bien definida
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $tabla)) {
                throw new Exception("Nombre de tabla inválido");
            }

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (Exception $e) {
            // Manejo de errores
            return "Error: " . $e->getMessage();
        } finally {
            // Cerrar el stmt y la conexión al final
            $stmt = null;
        }
    }

    /*=============================================
    Crear un nuevo registro
    =============================================*/
    static public function create($tabla, $datos) {
        try {
            // Verificar si la tabla está bien definida
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $tabla)) {
                throw new Exception("Nombre de tabla inválido");
            }

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, email, id_cliente, llave_secreta, created_at, updated_at) 
                                                   VALUES (:nombre, :apellido, :email, :id_cliente, :llave_secreta, :created_at, :updated_at)");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":llave_secreta", $datos["llave_secreta"], PDO::PARAM_STR);
            $stmt->bindParam(":created_at", $datos["created_at"], PDO::PARAM_STR);
            $stmt->bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error al insertar datos: " . implode(", ", $stmt->errorInfo()));
            }

        } catch (Exception $e) {
            // Manejo de errores
            return "Error: " . $e->getMessage();
        } finally {
            // Cerrar el stmt y la conexión al final
            $stmt = null;
        }
    }
}

?>
