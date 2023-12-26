
<?php
require_once("../../index.php");

    class Article {
        private $ArticleId;
        private $ArticleType;
        private $contenu;
        private $DateAjout;
        private $client;
        private $AssureurId;
        private $conn;


        public function __construct() {
            global $conn;
            $this->conn = $conn;
            $this->conn->select_db("assurance");
    
            if ($this->conn->connect_error) {
                die("Database selection failed: " . $this->conn->connect_error);
            }
            
             }

             public function setArticleId() {
                return $this->ArticleId;
             }
             public function setArticleType() {
                return $this->ArticleType;
             }
             public function setcontenu() {
                return $this->contenu;
             }
             public function setDateAjout() {
                return $this->DateAjout;
             }
             public function setClient() {
                return $this->client;
             }

            public function setAssureurId() {
                return $this->AssureurId;
            }
            
           
            }

    
    

?>