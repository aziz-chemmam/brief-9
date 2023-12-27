<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/models/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/models/prime.php");
require_once ("IPrimeService.php");


class PrimeService extends Database implements IPrimeService {
    function insert(Premium $prime){
        $pdo = $this->connect();

        try{
            $pdo->beginTransaction();

            $date = $prime->getDate();
            $clientId = $prime->getClaimId();



            $sql = "INSERT INTO Premium ( date, montant ,clientId) VALUES (:date, :montant, :clientId)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':clientId', $clientId);
            $stmt->bindParam(':montant', $montant);



            $stmt->execute();
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: " . $e->getMessage());
        }
    }
    function edit(Premium $prime){
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $PrimeId = $prime->getPremiumId();
            $date = $prime->getdate();
            $clientId = $prime->getClaimId();

        $sql = "UPDATE 'Premium' SET  'date' = :date ,'montant' = :montant ;'clientId' = :clientId ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':clientId', $clientId);


        $stmt->execute();
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        die("Error: " . $e->getMessage());        
        }
    }
    public function delete($premiumId) {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql ="DELETE FROM Premium WHERE premiumId = :premiumId";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":premiumId", $premiumId, PDO::PARAM_INT);

            $stmt->execute();

            $pdo->commit();

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }

    public function display() {
        $pdo = $this->connect();

        try {
            $pdo->beginTransaction();

            $sql = "SELECT * FROM premium";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $premiums = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pdo->commit();

            return $premiums;

        } catch (PDOException $e) {
            $pdo->rollBack();
            die("Error: ". $e->getMessage());
        }
    }
}



?>