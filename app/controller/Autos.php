<?php

namespace controller;

use model\TablaAuto;

require_once realpath('./vendor/autoload.php');
class Autos
{
    public static function obtener_datos()
    {
        $auto = new TablaAuto();
        echo json_encode($auto->consulta()->all());
        //echo json_encode($auto->consulta()->first());
        //['id_auto', 'nombre']
    }
    
    public static function insercion(){
        $auto = new TablaAuto();
        echo json_encode($auto->insercion(["marca" => "Mazda", "modelo" => "2018", "color" => "negro"]));
    }
    
    public static function actualizar_datos(){
        $auto = new TablaAuto();
        echo json_encode($auto->actualizar(['marca' => "Impala", 'modelo' => '1967', 'color' => 'negro'])->where('id_auto', '3'));
    }

    public static function eliminar()
    {
        $auto = new TablaAuto();
        echo json_encode($auto->eliminar()->where('id_auto', '3'));
        //echo json_encode($auto->eliminar($id));
    }
    
}
