<?php
include_once 'conexion.php';
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/model/Matricula.php');



class MatriculaDAO{
    public function __construct(){
        $cn=new conexion();
    }
    function registrarMatricula($objMatricula)
    {
        try {
            $obj=conexion::singleton();
            $aid=$objMatricula->getAlumnoId();
            $cid=$objMatricula->getCursoId();
            $turno=$objMatricula->getTurno();
            $data=$obj->prepare("INSERT INTO matricula VALUES('".$aid."',".$cid.",'".$turno."')");
            // $data->bindParam(0,$objMatricula->getAlumnoId());
            // $data->bindParam(1,$objMatricula->getCursoId());  
            $data->execute();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function getCursosMatriculados($uid)
    {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT c.codigo, c.nombre, c.ciclo, c.horas, c.creditos, m.turno
            FROM alumno as a
            JOIN matricula as m ON a.codigo_alumno = m.alumno_codigo_alumno
            JOIN cursos as c ON c.idCurso = m.cursos_idcursos
            where a.codigo_alumno='".$uid."';");
            $data->execute();
            return $data;
        } catch(Exception $e) {
            throw $e;
        }
    }
    
    
}