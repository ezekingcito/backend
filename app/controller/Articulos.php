<?php

namespace controller;

use model\TablaArticulo;

require_once realpath('./vendor/autoload.php');
class Articulos
{
    public static function obtener_datos()
    {
        $articulo = new TablaArticulo();
        echo json_encode($articulo->consulta()->all());
        //echo json_encode($articulo->consulta()->first());
        //['id_articulo', 'nombre']
    }

    public static function insercion(){
        $articulo = new TablaArticulo();
        echo json_encode($articulo->insercion(["articulo" => "PC ESCRITORIO", "precio" => "19000", "descripcion" => "RYZEN 7 7600H"]));
    }
    
    public static function actualizar_datos(){
        $articulo = new TablaArticulo();
        echo json_encode($articulo->actualizar(['articulo' => "PC ESCRITORIO", 'precio' => '20000', 'descripcion' => 'RYZEN 9 7800H'])->where('id_articulo', '1'));
    }

    public static function eliminar()
    {
        $articulo = new TablaArticulo();
        echo json_encode($articulo->eliminar()->where('id_articulo', '2'));
        //echo json_encode($articulo->eliminar($id));
    }
}
