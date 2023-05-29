<?php 
namespace controller;
use Config;
use Curso;
use cursoDAO;

require_once ('configuration/Config.php');
require_once ('model/Curso.php');
require_once('model/CursoDAO.php');

class CursosController{
    private $config;
    
    //constructor
    public function __construct(){ $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);}
    
    public function getCursos($mallaId){
        //get all courses from database
        $obj=new cursoDAO();
        return $obj->getCurso($mallaId);
       
    }
    public function getMallas(){
        //get all courses from database
        $obj=new cursoDAO();
        return $obj->getMalla();
       
    }
    public function getAllCursos(){
        //get all courses from database
        $obj=new cursoDAO();
        return $obj->getAllCursos();
    }
}


