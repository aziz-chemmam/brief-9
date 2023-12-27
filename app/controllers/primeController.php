<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/models/prime.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/services/primeService.php");

$primeService = new primeService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'addPrime') {
        $premiumId = uniqid(mt_rand(), true);
        $date = $_POST['montant'];
        $claimId = $_POST['claimId'];


        $premium = new Premium($premiumId, $montant, $claimId);

        $primeService->insert($premium);

        header("Location: ../views/admin/prime/prime.php");
        exit;

    } else if ($_POST["action"] == "editPrime") {
        $premiumId = $_POST['premiumId'];
        $montant = $_POST['montant'];
        $claimId = $_POST['claimId'];

        $premium = new Premium($premiumId, $montant, $claimId );

        $primeService->edit($premium);

        header("Location: ../views/admin/prime/prime.php");
        exit;

    } else if ($_POST['action'] == "deletePrime") {
        $premiumId = $_POST["deletePrimeId"];

        $primeService->delete($premiumId);

        header("Location: ../views/admin/prime/prime.php");
        exit;
    }
}

$premium = $primeService->display();

#----- to handle the upload of logos------
?>



<h1>kjhgfdxzdfghjklp</h1>