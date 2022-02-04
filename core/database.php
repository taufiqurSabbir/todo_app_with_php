<?php
    class Database{
        public $con;
    public function __construct(){
        $servername="localhost";
        $username ="root";
        $password ="";

       $connection =  new PDO("mysql:host=$servername;dbname=task",$username,$password);
       $this->con = $connection;
    }


    public function data_write($sql){
       $sate=  $this->con->prepare($sql);
       $sate->execute();
    }

    public function data_read($sql){
        $sate = $this->con->prepare($sql);
        $sate->execute();
        return $sate->fetchAll();
    }

}


?>