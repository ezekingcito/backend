<?php

namespace controller;

use model\TablaPersona;

require_once realpath('./vendor/autoload.php');
class Personas
{
    public static function obtener_datos()
    {
        $persona = new TablaPersona();
        echo json_encode($persona->consulta()->all());
        //echo json_encode($persona->consulta()->first());
        //['id_persona', 'nombre']
    }

    public static function actualizar_datos(){
        $persona = new TablaPersona();
        echo json_encode($persona->actualizar(['nombre' => "Alejandro", 'apellido' => 'Ortega', 'email' => 'nunigunao@gmaail.com'])->where('id_persona', '2'));
    }

    public static function insercion(){
        $persona = new TablaPersona();
        echo json_encode($persona->insercion(["nombre" => "Joaquin", "apellido" => "Iglesias", "email" => "ehemplo@gmail.com"]));
    }
    
    public static function eliminar()
    {
        $persona = new TablaPersona();
        echo json_encode($persona->eliminar()->where('id_persona', '4'));
        //echo json_encode($persona->eliminar($id));
    }
}
