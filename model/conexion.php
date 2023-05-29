<?php
class conexion{
    private static $cn=null;

    public   function __construct(){
        $dns='mysql:dbname=matricula;host=localhost';
        $user='root';
        $pass='blackN10';
        try{
            self::$cn=new PDO($dns,$user,$pass);
            //self::$cn->exec("SET CHARACTER SETR utf8"); el servidor que tengo no l o necesita
        }catch(PDOException $e){
            print "ERROR : ".$e->getMessage();
            die();
        }
    }
    public static function singleton(){
        return self::$cn;
    }  
}
?>