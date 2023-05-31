<?php
namespace controller;

use cursoDAO;

require_once('model/Curso.php');
require_once('model/CursoDAO.php');

if (isset($_POST['registerMatricula'])) {
    require_once('../model/Curso.php');
    require_once('../model/CursoDAO.php');
}

class CursosController{
    
    public function getCursos($carrera){
        //get all courses from database
        $obj = new cursoDAO();
        return $obj->getCursos($carrera);

    }
    public function getMallas($carrera)
    {
        //get all courses from database
        $obj = new cursoDAO();
        return $obj->getMalla($carrera);
    }
    public function getAllCursos()
    {
        //get all courses from database
        $obj = new cursoDAO();
        return $obj->getAllCursos();
    }

    // public function getCursosByMalla($mallaId)
    // {
    //     // Assuming you have a data source or database connection established

    //     // Prepare the query to retrieve cursos for the specified mallaId
    //     $query = "SELECT * FROM cursos WHERE mallaId = :mallaId";
    //     $stmt = $this->config->getConnection()->prepare($query);
    //     $stmt->bindParam(":mallaId", $mallaId);
    //     // Execute the query
    //     $stmt->execute();

    //     // Fetch all the rows as an associative array
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     // Return the fetched cursos
    //     return $result;
    // }
}