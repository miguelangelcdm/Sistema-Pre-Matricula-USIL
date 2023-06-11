<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/MatriculaDAO.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/Matricula.php');


class MatriculaController{
    function registrarMatricula($alumno_codigo_alumno,$cursos_seleccionados,$turno) {
        $obj = new MatriculaDAO();    
        $objMatricula = new Matricula();
        $objMatricula->setAlumnoId($alumno_codigo_alumno);
        $objMatricula->setCursoId($cursos_seleccionados);
        $objMatricula->setTurno($turno);
        $obj->registrarMatricula($objMatricula);
        // ob_clean();
        // header('Location: ' . $_SERVER['REQUEST_URI']);
        // exit;
    }   
    public function getCursosMatriculados($uid)
    {
        $obj = new MatriculaDAO();
        return $obj->getCursosMatriculados($uid);
    }   
    public function deleteMatricula($uid,$cid)
    {
        $obj = new MatriculaDAO();
        // $matricula= new Matricula()
        return $obj->deleteMatricula($uid,$cid);
    }  
}