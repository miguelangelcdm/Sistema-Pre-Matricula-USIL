<?php
include_once 'conexion.php';
class alumnoDAO{

    public function __construct(){
        $cn=new conexion();
    }

    function findById($codigo_alumno) {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT * FROM alumno WHERE codigo_alumno LIKE '" . $codigo_alumno . "'");
            $data->execute();
            return $data->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw $e;
        }
    }
}