<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/MatriculaDAO.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/Matricula.php');


class MatriculaController{
    function registrarMatricula($alumno_codigo_alumno,$cursos_seleccionados) {
      $obj = new MatriculaDAO();    
      $objMatricula = new Matricula();
      $objMatricula->setAlumnoId($alumno_codigo_alumno);
      $objMatricula->setCursoId($cursos_seleccionados);
      $obj->registrarMatricula($objMatricula);
    }      
}