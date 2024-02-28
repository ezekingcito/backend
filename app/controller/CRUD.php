<?php
namespace controller;
use config\Conexion;
use PDO;
require_once realpath('./vendor/autoload.php');
class CRUD
{
    public function __construct($tabla,$id_tabla)
    {
        $this->tabla = $tabla;
        $this->id_tabla = $id_tabla;
        $this->atributos = $this->atributos_tabla();
    }
    public function atributos_tabla(){
        $consulta = Conexion::obtener_conexion()->prepare("DESCRIBE $this->tabla");
        $consulta->execute();
        $campos = $consulta->ferchAll(PDO::FETCH_ASSOC);
        $atributos = [];
        foreach ($campos as $campo) {
            array_push($atributos, $campo['Field']);
        }
        return $atributos;
    }
    public function consulta($seleccion = ['*']){
        $seleccion = implode(',' ,$seleccion);
        $consulta= Conexion::obtener_conexion()->prepare("SELECT $seleccion FROM $this->tabla");
        if ($consulta -> execute()) {
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $data = [];
        }
        return $data;
    }
    public static function mostrar_datos()
    {
        $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM t_persona");
        if (!$consulta->execute()) {
            echo 'No se pudo realizar la consulta';
        } else {
            $dato = $consulta->fetchAll(PDO::FETCH_ASSOC);
            echo print_r($dato);
            echo 'Se completo la peticion';
        }
    }

    private static function consulta_id($id)
    {
        $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM $this->tabla WHERE $this->id_tabla=:id_tabla");
        if ($consulta->execute($id)) {
            $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        } else {
            $dato = [];
        }
        return $dato;
    }

    public static function insercion($datos)
    {
        $consulta = Conexion::obtener_conexion()->prepare("INSERT INTO t_persona(nombre, apellido, email) VALUES (:nombre, :apellido, :email)");
        if ($consulta->execute($datos)) {
            echo json_encode([1, "Insercion correcta"]);
        } else {
            echo json_encode([0, "Error al insertar datos"]);
        }
    }

    public static function actualzar($datos)
    {
        $datos_actuales = self::consulta_id(['id_persona' => $datos['id_persona']]);
        $datos_actuales['nombre'] =  array_key_exists('nombre', $datos) ? $datos['nombre'] : $datos_actuales['nombre'];
        $datos_actuales['apellido'] =  array_key_exists('apellido', $datos) ? $datos['apellido'] : $datos_actuales['apellido'];
        $datos_actuales['email'] =  array_key_exists('email', $datos) ? $datos['email'] : $datos_actuales['email'];

        $consulta = Conexion::obtener_conexion()->prepare("UPDATE $this->tabla SET nombre=:nombre, apellido=:apellido, email=:email WHERE id_persona=:id_persona");
        if ($consulta->execute($datos_actuales)) {
            echo json_encode([1, "Actualizacion correcta"]);
        } else {
            echo json_encode([0, "Error al actualizar datos"]);
        }
    }

    public static function eliminar($id)
    {
        $consulta = Conexion::obtener_conexion()->prepare("DELETE FROM $this->tabla WHERE $this->id_tabla");
        if ($consulta->execute($id)) {
            echo json_encode([1, "Eliminacion correcta"]);
        } else {
            echo json_encode([0, "Error al eliminar datos"]);
        }
    }
}




/* Crud::actualzar(['id_persona' => 1,'nombre' => 'Alberto', 'apellido' => 'Cruz']); */

