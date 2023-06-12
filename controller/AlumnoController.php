<?php
namespace controller;

use alumnoDAO ;


require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/AlumnoDAO.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/Alumno.php');

class AlumnoController{
    
    public function findById($codigo_alumno){
        $obj = new alumnoDAO();
        return $obj->findById($codigo_alumno);
    }

    public function getAlumnosCurso($cid){
        //get alumnos matriculados a curso from database
        $obj = new alumnoDAO();
        return $obj->getAlumnosCurso($cid);
    }
     
    public function cantidadMatriculadosCurso($cid){
        //get alumnos matriculados a curso from database
        $obj = new alumnoDAO();
        return $obj->cantidadMatriculadosCurso($cid);
    }
}