<?php
require_once realpath('../../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();

define('SERVIDOR', $_ENV['HOST']);
define('USER', $_ENV['USER']);
define('PASSWORD', $_ENV['PASSWORD']);
define('BD', $_ENV['BD']);
define('PORT', $_ENV['PORT']);

class Conexion
{
    private static $conexion;

    public static function abrir_conexion()
    {
        if (!isset(self::$conexion)) {
            try {
                self::$conexion = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . BD, USER, PASSWORD);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec('SET CHARACTER SET utf8');
            } catch (PDOException $e) {
                echo 'Error en la conexion: ' . $e->getMessage() . " :(";
                die();
            }
        }
        return self::$conexion;
    }

    public static function obtener_conexion()
    {
        return self::abrir_conexion();
    }

    public static function cerrar_conexion()
    {
        self::$conexion = null;
    }
}

class ReadDatos
{
    public static function obtenerDatosTabla1()
    {
        try {
            $conexion = Conexion::obtener_conexion();
            $consulta = $conexion->prepare("SELECT * FROM tabla1");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error en la consulta: ' . $e->getMessage() . " :(";
            die();
        }
    }
}

class CreateDatos
{
    public static function agregarNuevoValor($valor)
    {
        try {
            $conexion = Conexion::obtener_conexion();
            $consulta = $conexion->prepare("INSERT INTO tabla1 (nombre) VALUES (:nombre)");
            $consulta->bindParam(':nombre', $valor);
            $consulta->execute();
        } catch (PDOException $e) {
            echo 'Error al agregar nuevo valor: ' . $e->getMessage() . " :(";
            die();
        }
    }
}

class UpdateDatos
{
    public static function actualizarValor($id, $nuevoValor)
    {
        try {
            $conexion = Conexion::obtener_conexion();
            $consulta = $conexion->prepare("UPDATE tabla1 SET nombre = :nombre WHERE id = :id");
            $consulta->bindParam(':nombre', $nuevoValor);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
        } catch (PDOException $e) {
            echo 'Error al actualizar valor: ' . $e->getMessage() . " :(";
            die();
        }
    }
}

class DeleteDatos
{
    public static function eliminarRegistro($id)
    {
        try {
            $conexion = Conexion::obtener_conexion();
            $consulta = $conexion->prepare("DELETE FROM tabla1 WHERE id = :id");
            $consulta->bindParam(':id', $id);
            $consulta->execute();
        } catch (PDOException $e) {
            echo 'Error al eliminar registro: ' . $e->getMessage() . " :(";
            die();
        }
    }
}



//CreateDatos::agregarNuevoValor('JUAN');

//UpdateDatos::actualizarValor(7, 'ALBERTO');

DeleteDatos::eliminarRegistro(7);


$datosTabla1 = ReadDatos::obtenerDatosTabla1();
print_r($datosTabla1);

