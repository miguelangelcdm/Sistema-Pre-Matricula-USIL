<?php 
namespace controller;
use Config;
use Curso;

require_once ('configuration/Config.php');
require_once ('model/Curso.php');

class CursosController{
    private $config;
    
    //constructor
    public function __construct(){ $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);}
    
    public function getCursos($mallaId){
        //get all courses from database
       
       
    }
}


