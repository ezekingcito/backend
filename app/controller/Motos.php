<?php

namespace controller;

use model\TablaMoto;

require_once realpath('./vendor/autoload.php');
class Motos
{
    public static function obtener_datos()
    {
        $moto = new TablaMoto();
        echo json_encode($moto->consulta()->all());
        //echo json_encode($moto->consulta()->first());
        //['id_moto', 'nombre']
    }
    
    public static function insercion(){
        $moto = new TablaMoto();
        echo json_encode($moto->insercion(["marca" => "Vento", "modelo" => "2024", "color" => "blanca"]));
    }

    public static function actualizar_datos(){
        $moto = new TablaMoto();
        echo json_encode($moto->actualizar(['marca' => "Kawasaki", 'modelo' => '2020', 'color' => 'verde'])->where('id_moto', '1'));
    }


    public static function eliminar()
    {
        $moto = new TablaMoto();
        echo json_encode($moto->eliminar()->where('id_moto', '3'));
        //echo json_encode($moto->eliminar($id));
    }
}
