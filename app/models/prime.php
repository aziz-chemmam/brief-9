<?php
class Premium {
    private  $premiumId ;
    private $montant;
    private $date ;
    private $claimId;

    public function __construct($premiumId, $date, $claimId) {
        $this->premiumId = $premiumId;
        $this->date = $date;
        $this->claimId = $claimId;
    }

    
    public function getPremiumId() {
        return $this->premiumId;
    }

    
    public function getDate() {
        return $this->date;
    }

    public function getMontant() { 
        return $this->montant;
    }


    
    public function getClaimId() {
        return $this->claimId;
    }

    
    public function setPremiumId($premiumId) {
        $this->premiumId = $premiumId;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

    
    public function setDate($date) {
        $this->date = $date;
    }
    public function setClaimId($claimId) {
        $this->claimId = $claimId;
    }
}


?>