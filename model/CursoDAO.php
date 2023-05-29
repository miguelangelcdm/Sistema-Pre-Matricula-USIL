<?php
include_once 'conexion.php';
class cursoDAO{

    public function __construct(){
        $cn=new conexion();
    }

    function getCurso($mallaid) {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT * FROM cursos WHERE mallaid LIKE '" . $mallaid . "'");
            $data->execute();
            return $data;
        } catch(Exception $e) {
            throw $e;
        }
    }

    function getMalla(){
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT distinct(mallaid) FROM cursos");
            $data->execute();
            return $data->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw $e;
        }
    }

    function getAllCursos() {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT * FROM cursos");
            $data->execute();
            return $data;
        } catch(Exception $e) {
            throw $e;
        }
    }
}
?>