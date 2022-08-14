<?php
class db{
protected $connection;

function setconnection(){
    try{
        $this->connection=new PDO("mysql:host=localhost; dbname=society_management","root","");
        //echo "";
    }catch(PDOException $e){
        echo "Error";
        //die();

    }
}

}
