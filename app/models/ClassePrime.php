<?php
require_once("../../index.php");

    class Prime{
        private $conn;
        private $PimeId;
        private $Montant;
        private $DateDePrime;
        private $ClaimID;

        public function __construct(){
            global $conn;
            $this->conn = $conn;
            $this->conn->select_db("assurance");

            if($this->conn->connect_error){
                die("database selected failed". $this->conn->connect_error);
            }
        }
        public function setPrimeId(){
            return $this->PimeId;   
        }
        public function setMontant(){
            $this->Montant;
        }
        public function setDateDePrime(){
            $this->DateDePrime;
        }
        public function setClaimID(){;
            $this->ClaimID;
        }

    }
?>