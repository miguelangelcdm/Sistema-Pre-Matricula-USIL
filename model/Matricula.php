<?php 

class Matricula{
    private String $alumno_codigo_alumno;
    private int $cursos_idcursos;
    private String $turno;

    //destructor
    // public function __destruct(){} 
    // public function __construct(String $alumno_codigo_alumno, int $cursos_idcursos){
    //     $this->alumno_codigo_alumno=$alumno_codigo_alumno;
    //     $this->cursos_idcursos=$cursos_idcursos;
    // }

    //getter and setter
    public function getAlumnoId(){
        return $this->alumno_codigo_alumno;
    }
    public function setAlumnoId(String $alumno_codigo_alumno){
        $this->alumno_codigo_alumno = $alumno_codigo_alumno;
    }

    public function getCursoId(){
        return $this->cursos_idcursos;
    }
    public function setCursoId(int $cursos_idcursos){
        $this->cursos_idcursos = $cursos_idcursos;
    }
    public function getTurno(){
        return $this->turno;
    }
    public function setTurno(String $turno){
        $this->turno = $turno;
    }
}
    
?>