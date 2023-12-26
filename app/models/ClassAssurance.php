<?php
require_once("../../index.php");

Class Assurance{
    private $conn;
    private $AssureurId;
    private $Nom;
    private $Adresse;

    public function __construct(){
        global$conn;
        $this->conn = $conn;
        $this->conn->select_db("assurance");

        if($this->conn->connect_error){
            die("database selection failed:". $this->conn->connect_error);
        }
    }

    public function setAssureurId(){
        return$this->AssureurId;
    }
    public function setNom(){
        return$this->Nom;
    }
    public function setAdresse(){
        return$this->Adresse;
    }
    
}

?>