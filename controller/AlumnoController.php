<?php
namespace controller;

use alumnoDAO ;


require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/AlumnoDAO.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/Alumno.php');

class AlumnoController{
    
    public function findById($codigo_alumno){
        //get all courses from database
        $obj = new alumnoDAO();
        return $obj->findById($codigo_alumno);
    }
     
}