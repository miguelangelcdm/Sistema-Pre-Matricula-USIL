<?php
include_once 'conexion.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/Matricula.php');
class MatriculaDAO
{
    public function __construct()
    {
        $cn = new conexion();
    }
    function registrarMatricula($objMatricula)
    {
        try {
            $obj = conexion::singleton();
            $aid = $objMatricula->getAlumnoId();
            $cid = $objMatricula->getCursoId();
            $data = $obj->prepare("INSERT INTO matricula VALUES('" . $aid . "'," . $cid . ")");
            // $data->bindParam(0,$objMatricula->getAlumnoId());
            // $data->bindParam(1,$objMatricula->getCursoId());  
            $data->execute();
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }
}