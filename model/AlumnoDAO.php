<?php
include_once 'conexion.php';
class alumnoDAO{

    public function __construct(){
        $cn=new conexion();
    }

    function findById($codigo_alumno) {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT * FROM alumno WHERE codigo_alumno LIKE '" . $codigo_alumno . "'");
            $data->execute();
            return $data->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw $e;
        }
    }

    // function getAlumnosCurso($cid) {
    //     try {
    //         $obj = conexion::singleton();
    //         $data = $obj->prepare("select a.codigo_alumno,a.fullName,a.carrera from alumno as a 
    //         join matricula as m on a.codigo_alumno=m.alumno_codigo_alumno
    //         join cursos as c on c.idcurso=m.cursos_idcursos
    //         where m.cursos_idcursos=".$cid.";");
    //         $data->execute();
    //         return $data->fetch(PDO::FETCH_ASSOC);
    //     } catch(Exception $e) {
    //         throw $e;
    //     }
    // }
    function getAlumnosCurso($cid) {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT a.codigo_alumno, a.fullName, m.turno FROM alumno AS a
                JOIN matricula AS m ON a.codigo_alumno = m.alumno_codigo_alumno
                JOIN cursos AS c ON c.idcurso = m.cursos_idcursos
                WHERE m.cursos_idcursos = :cid");
            $data->bindParam(':cid', $cid, PDO::PARAM_INT);
            $data->execute();
            return $data->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw $e;
        }
    }
    
    function cantidadMatriculadosCurso($cid) {
        try {
            $obj = conexion::singleton();
            $data = $obj->prepare("SELECT count(a.codigo_alumno) AS nmatriculados  FROM alumno AS a
                JOIN matricula AS m ON a.codigo_alumno = m.alumno_codigo_alumno
                JOIN cursos AS c ON c.idcurso = m.cursos_idcursos
                WHERE m.cursos_idcursos = :cid");
            $data->bindParam(':cid', $cid, PDO::PARAM_INT);
            $data->execute();
            return $data->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw $e;
        }
    }


}