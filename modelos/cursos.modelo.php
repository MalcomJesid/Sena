<?php

require_once "conexion.php";

class ModeloCursos {

    /*=============================================
    Mostrar todos los registros
    =============================================*/
    static public function index($tabla1, $tabla2, $cantidad, $desde) {
        try {
            $sql = "SELECT $tabla1.id, $tabla1.titulo, $tabla1.descripcion, $tabla1.instructor, $tabla1.imagen, $tabla1.precio, $tabla1.id_creador, $tabla2.nombre, $tabla2.apellido 
                    FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_creador = $tabla2.id";

            // Condición para cantidad y desde
            if ($cantidad !== null) {
                $sql .= " LIMIT :desde, :cantidad";
            }

            $stmt = Conexion::conectar()->prepare($sql);

            if ($cantidad !== null) {
                $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                $stmt->bindParam(":desde", $desde, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    Crear un nuevo registro
    =============================================*/
    static public function create($tabla, $datos) {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, descripcion, instructor, imagen, precio, id_creador, created_at, updated_at) 
                                                   VALUES (:titulo, :descripcion, :instructor, :imagen, :precio, :id_creador, :created_at, :updated_at)");

            $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":instructor", $datos["instructor"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":id_creador", $datos["id_creador"], PDO::PARAM_STR);
            $stmt->bindParam(":created_at", $datos["created_at"], PDO::PARAM_STR);
            $stmt->bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error en la inserción: " . implode(", ", $stmt->errorInfo()));
            }

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    Mostrar un registro específico
    =============================================*/
    static public function show($tabla1, $tabla2, $id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT $tabla1.id, $tabla1.titulo, $tabla1.descripcion, $tabla1.instructor, $tabla1.imagen, $tabla1.precio, $tabla1.id_creador, 
                                                    $tabla2.nombre, $tabla2.apellido 
                                                    FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_creador = $tabla2.id WHERE $tabla1.id = :id");

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    Actualizar un registro
    =============================================*/
    static public function update($tabla, $datos) {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, instructor = :instructor, 
                                                   imagen = :imagen, precio = :precio, updated_at = :updated_at WHERE id = :id");

            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":instructor", $datos["instructor"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error en la actualización: " . implode(", ", $stmt->errorInfo()));
            }

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    Eliminar un registro
    =============================================*/
    static public function delete($tabla, $id) {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                throw new Exception("Error al eliminar: " . implode(", ", $stmt->errorInfo()));
            }

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        } finally {
            $stmt = null;
        }
    }
}

?>
