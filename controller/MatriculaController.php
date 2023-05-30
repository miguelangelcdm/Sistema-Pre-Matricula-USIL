<?php
// include("../models/MatriculaDAO.php");
// include("../models/Matricula.php");
require_once('model/MatriculaDAO.php');
require_once('model/Matricula.php');

class MatriculaController{
    // function registrarMatricula($alumno_codigo_alumno, $cursos_idcursos){
    //     $objMatricula=new Matricula();
    //     $obj=new MatriculaDAO();
     
    //     $objMatricula->setAlumnoId($alumno_codigo_alumno);
    //     $objMatricula->setCursoId($cursos_idcursos);
     
    //     $obj->registrarMatricula($objMatricula);
    //     require 'view/detalle/constancia.php';
    // }
    function registrarMatricula($alumno_codigo_alumno,$cursos_seleccionados) {
        $obj = new MatriculaDAO();
      
        foreach ($cursos_seleccionados as $curso_id) {
          $objMatricula = new Matricula();
          $objMatricula->setAlumnoId($alumno_codigo_alumno);
          $objMatricula->setCursoId($curso_id);
          $obj->registrarMatricula($objMatricula);
        }
      
        require 'view/constancia.php';
      }
      
}