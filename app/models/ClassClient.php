<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/index.php");

    class Client{
        private $ClientId;
        private $Nom;
        private $Prenom;
        private $Adresse;
        private $CNI;
        private $assuranceId;

        private $conn;


            public function __construct(){
                global $conn;
                $this->conn = $conn;
                $this->conn->select_db("assurance");

                if($this->conn->connect_error){
                    die("database selection failed:".$this->conn->connect_error) ;
                }

            }

            public function setClientId(){
                return $this->ClientId;
            }
            public function getClientId(){
                return $this->ClientId;
            }

            public function setNom(){
                return $this->Nom;
            }

            public function getNom(){
                return $this->Nom;
            }


            public function setPrenom(){
                $this->Prenom ;
            }
            public function getPrenom(){
                return $this->Prenom;
            }
            public function setAdresse(){
                $this->Adresse ;
            }

            public function getAdresse(){
                return $this->Adresse;
            }
            public function setCNI(){
                $this->CNI ;
            }

            public function getCNI(){
                return $this->CNI;
            }

            public function setAssuranceId(){
                $this->assuranceId ;
            }

            public function getAssurance(){
                return $this->assuranceId;
            }



    }

?>