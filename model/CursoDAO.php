<?php
include_once 'conexion.php';
class cursoDAO{

    public function __construct(){
        $cn=new conexion();
    }

    // function getCurso($mallaid) {
    //     try {
    //         $obj = conexion::singleton();
    //         $data = $obj->prepare("SELECT * FROM cursos WHERE mallaid LIKE '" . $mallaid . "'");
    //         $data->execute();
    //         return $data;
    //     } catch(Exception $e) {
    //         throw $e;
    //     }
    // }
    function getMalla($carrera){
        try {
            $obj = conexion::singleton();            
            if($carrera == 'Ingenieria en Sistemas de Informacion'){
                $data = $obj->prepare("select distinct(mallaid) from cursos where mallaid='PC IS-16' || mallaid='PC IS-19' ||mallaid='PC IS-22' ||mallaid='PC IS-23'");
            }elseif($carrera == 'Ingenieria de Software'){
                $data = $obj->prepare("select distinct(mallaid) from cursos where mallaid='PC SW-19' || mallaid='PC SW-22' ||mallaid='PC SW-23'");
            }elseif($carrera == 'Ciencia de Datos'){
                $data = $obj->prepare("select distinct(mallaid) from cursos where mallaid='PC CDx-23'");
            }
            $data->execute();
            return $data->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw $e;
        }
    }

    function getCursos($carrera){
        try {
            $obj = conexion::singleton();            
            if($carrera == 'Ingenieria en Sistemas de Informacion'){
                $data = $obj->prepare("select * from cursos where mallaid='PC IS-16' || mallaid='PC IS-19' ||mallaid='PC IS-22' ||mallaid='PC IS-23'");
                $data->execute();
                return $data->fetchAll(PDO::FETCH_ASSOC);
            }elseif($carrera == 'Ingenieria de Software'){
                $data = $obj->prepare("select * from cursos where mallaid='PC SW-19' || mallaid='PC SW-22' ||mallaid='PC SW-23'");
                $data->execute();
                return $data->fetchAll(PDO::FETCH_ASSOC);
            }elseif($carrera == 'Ciencia de Datos'){
                $data = $obj->prepare("select * from cursos where mallaid='PC CDx-23'");
                $data->execute();
                return $data->fetchAll(PDO::FETCH_ASSOC);
            }
            
            //return $data->fetchAll(PDO::FETCH_ASSOC);
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
    function getCursoByMalla($mallaid) {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT * FROM cursos WHERE mallaid LIKE :mallaid");
            $data->bindParam(":mallaid", $mallaid);
            $data->execute();
            return $data->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>