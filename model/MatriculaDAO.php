<?php
include_once 'conexion.php';
class MatriculaDAO{
    public function __construct(){
        $cn=new conexion();
    }
    function registrarMatricula($objMatricula){
        try {
            $obj=conexion::singleton();
            $data=$obj->prepare('INSERT INTO matricula VALUES(?,?)');
            $data->bindParam(0,$objMatricula->getAlumnoId());
            $data->bindParam(1,$objMatricula->getCursoId());  
            $data->execute();
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }
}