<?php
namespace controller;

use alumnoDAO ;

require_once('model/AlumnoDAO.php');
require_once('model/Alumno.php');

class AlumnoController{
    
    public function findById($codigo_alumno){
        //get all courses from database
        $obj = new alumnoDAO();
        return $obj->findById($codigo_alumno);
    }
     
}