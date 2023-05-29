<?php 

class Alumno{
    private String $codigo_alumno;
    private String $fullName;
    private String $password;
    private String $mallaId;
    private String $carrera;

    //destructor
    public function __destruct(){} 
    public function __construct(String $codigo_alumno, String $fullName,String $password,String $carrera){
        $this->codigo_alumno = $codigo_alumno;
        $this->fullName = $fullName;
        $this->password = $password;
        $this->carrera = $carrera;
    }
    //getter and setter
    public function getCodigo_alumno(){
        return $this->codigo_alumno;
    }
    public function setCodigo_alumno(String $codigo_alumno){
        $this->codigo_alumno = $codigo_alumno;
    }
    public function getFullName(){
        return $this->fullName;
    }
    public function setFullName(String $fullName){
        $this->fullName = $fullName;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword(String $password){
        $this->password = $password;
    }
    public function getMallaId(){
        return $this->mallaId;
    }
    public function setMallaId(String $mallaId){
        $this->mallaId = $mallaId;
    }
    public function getCarrera(){
        return $this->carrera;
    }
    public function setCarrera(String $carrera){
        $this->carrera = $carrera;
    }

}