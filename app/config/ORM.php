<?php

namespace config;

use config\Conexion;
use PDO;

require_once realpath('./vendor/autoload.php');
class ORM
{
    protected $tabla;
    protected $id_tabla;
    protected $atributos;

    function __construct()
    {
        $this->atributos = $this->atributos_tabla();
    }

    private function atributos_tabla()
    {
        $consulta = Conexion::obtener_conexion()->prepare("DESCRIBE $this->tabla");
        $consulta->execute();
        $campos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $atributos = [];
        foreach ($campos as $campo) {
            array_push($atributos, $campo['Field']);
        }
        return $atributos;
    }

    public function where($campo, $valor_campo)
    {
        $queryFinal = $this->query;
        $consulta = Conexion::obtener_conexion()->prepare("$queryFinal WHERE $campo = :filtro");
        if ($consulta->execute(['filtro' => "$valor_campo"])) {
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = [];
        }
        return $data;
    }

    public function all()
    {
        $queryFinal = $this->query;
        $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
        if ($consulta->execute()) {
            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = [];
        }
        return $data;
    }

    public function first()
    {
        $queryFinal = $this->query;
        $consulta = Conexion::obtener_conexion()->prepare($queryFinal);
        if ($consulta->execute()) {
            $data = $consulta->fetch(PDO::FETCH_ASSOC);
        } else {
            $data = [];
        }
        return $data;
    }

    public function consulta($seleccion = ['*'])
    {
        $seleccion = implode(',', $seleccion);
        $this->query = "SELECT $seleccion FROM $this->tabla";
        return $this;
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

    /* public function consulta_id($id)
    {
        $consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM  $this->tabla WHERE $this->id_tabla = :id");
        if ($consulta->execute(['id' => $id])) {
            $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        } else {
            $dato = [];
        }
        return $dato;
    } */

    public function insercion($datos)
    {
        $temp = array();
        foreach($this->atributos as $valor){
            if ($this->id_tabla != $valor) {
                array_push($temp,$valor);
            }
        }
        $propiedades  = implode(",", $temp);
        $propiedades_key = ":" . implode(", :", $temp);
        $consulta = Conexion::obtener_conexion()->prepare("INSERT INTO $this->tabla ($propiedades) VALUES ($propiedades_key)");
        if ($consulta->execute($datos)) {
            return ([1, "Insercion correcta"]);
        } else {
            return ([0, "Error al insertar datos"]);
        }
    }


    
    public function actualizar($datos)
    {
        $queryBloque = [];
        foreach (array_keys($datos) as $key) {
            if ($this->id_tabla != $key) {
                array_push($queryBloque, $key . '=' . "'$datos[$key]'");
            }
        }
        $queryBloque = implode(', ', $queryBloque);
        $this->query = "UPDATE $this->tabla SET $queryBloque";
        /* $consulta = Conexion::obtener_conexion()->prepare("UPDATE $this->tabla SET $query WHERE $this->id_tabla=:$this->id_tabla"); */
        return $this;
    }

    public function eliminar()
    {
        $this->query = "DELETE FROM $this->tabla";
        return $this;
    }
}

/* Crear 3 tablas mas, crear 3 controladores mas, y 3 modelos mas TEREA */
