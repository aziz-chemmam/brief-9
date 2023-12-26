<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/services/client/clientIntface.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/models/ClassClient.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/index.php");
    class ClientServices  implements clientInterface
    {
        private $conn;
        public function __construct(){
            global $conn;
            $this->conn = $conn;
            $this->conn->select_db("assurance");

            if($this->conn->connect_error){
                die("database selection failed:".$this->conn->connect_error) ;
            }

        }
        public function addClient(Client $client)
        {
             $conn = $this->conn();

            $Nom = $client->getNom();
            $Prenom = $client->getPrenom();
            $Adresse = $client->getAdresse();
            $CNI = $client->getCNI();

            $query = "INSERT INTO client (Nom,Prenom,Adresse,CIN) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $Nom, $Prenom, $Adresse, $CNI);
            $stmt->execute();
            $userid = $conn->insert_id;
            return $userid;
        }

        public function ShowClient()
        {
            $conn = $this->conn();
            $query = "SELECT * FROM client ORDER BY userId DESC";
            $result = $conn->query($query);

            $clients = array();
            while ($row = $result->fetch_assoc()) {
                $clients[] = new client ($row["ClientId"], $row["Nom"], $row["Prenom"], $row["Adresse"], $row["CNI"] , $row["assuranceId"]);
            }
            return $clients;
        }



        public function UpdateClient(Client $client, $id)
        {
            $conn = $this->conn();
            $Nom = $client->getNom();
            $Prenom = $client->getPrenom();
            $Adresse = $client->getAdresse();
            $CNI = $client->getCNI();
            $assuranceId = $client->getAssurance();

            $query  = "UPDATE client SET Nom=?, Prenom=?, Adresse=?, CNI=?, assuranceId =? WHERE userId = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssii", $Nom, $Prenom, $Adresse, $CNI, $assuranceId, $id);
            $stmt->execute();
        }

        public function DeleteClient($id)
        {
            $conn = $this->conn();
            $query = "DELETE FROM client WHERE userId = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
        }
    }
?>
    