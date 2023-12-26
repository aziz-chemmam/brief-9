<?php
require_once("../../index.php");

    class Claim{
        private $conn;
        private $ClaimID;
        private $descriptions;
        private $DatedeClaim;
        private $ArticleId;


        public function __construct(){
            global $conn;
            $this->conn= $conn;
            $this->conn->select_db("assurance");
            
            if($this->conn->connect_errno){
                die ("database selection failde". $this->conn->connect_error);
            }
         }

         public function setClaimID(){
            return $this->ClaimID;
         }
         public function setDescription(){
            return $this->descriptions;
         }

         public function setDateDeClaim(){
            return $this->DatedeClaim;
         }
         public function setArticleId(){
            return $this->ArticleId;
         }

    }
?>
