<?php

require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/services/client/clientIntface.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/app/models/ClassClient.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief-9/index.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitAddClient"])) {
    $client = new Client();
    $client->setNom($_POST["Nom"]);
    $client->setPrenom($_POST["Prenom"]);
    $client->setAdresse($_POST["Adresse"]);
    $client->setCNI($_POST["CIN"]);
    $client->setAssuranceId($_POST["assuranceId"]);


    $userId = $client->addClient($client);

    // Redirect to a page or display a success message
    header("Location: ../../../../index.php");
    exit();
}

// Check if the form is submitted for updating a client
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitUpdateClient"])) {
    $client = new Client();
    $client->setusername($_POST["nom"]);
    $client->setPrenom($_POST["prenom"]);
    $client->setAdress($_POST["adresse"]);
    $client->setCNI($_POST["cni"]);

    $userId = $_POST["userId"]; // Get the user ID from the form

    $client->UpdateClient($client, $userId);

    // Redirect to a page or display a success message
    header("Location: index.php");
    exit();
}

// Check if the form is submitted for deleting a client
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitDeleteClient"])) {
    $userId = $_POST["userId"]; // Get the user ID from the form

    $client = new Client();
    $client->DeleteClient($userId);

    // Redirect to a page or display a success message
    header("Location: ../../../../index.php");
    exit();
}

// Display the list of clients
$client = new Client();
$clients = $client->ShowClient();

// Include your view file to display the clients
include("../views/admin/client/client.php");
?>
