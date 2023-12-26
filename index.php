<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS assurance";
if (mysqli_query($conn, $sql)) {
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Select the database
mysqli_select_db($conn, "assurance");



         // create Article table

$sql = "CREATE TABLE IF NOT EXISTS  Article (
  ArticleId INT(50)  AUTO_INCREMENT PRIMARY KEY,
  ArticleType VARCHAR(255) NOT NULL,
  Contenu VARCHAR(255) NOT NULL,
  DateAjout VARCHAR(255),
  ClientId INT(50),
  AssureurId INT(50),
  FOREIGN KEY (ClientId) REFERENCES Client(ClientId),
  FOREIGN KEY (AssureurId) REFERENCES assureur(AssureurId)
)";
if (mysqli_query($conn, $sql)) {
  // echo "Table Article created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


        // create assureur table
$sql = "CREATE TABLE IF NOT EXISTS  assureur (
  AssureurId INT(50)  AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Adresse VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    // echo "Table assureur created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


        // create Client table

$sql = "CREATE TABLE IF NOT EXISTS  Client (
  ClientId INT(50)  AUTO_INCREMENT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Prenom VARCHAR(255) NOT NULL,
  Adresse VARCHAR(255) NOT NULL,
  CIN VARCHAR(255) NOT NULL,
  assuranceId INT(50),
  FOREIGN KEY (assuranceId) REFERENCES assureur(AssureurId)
)";

if (mysqli_query($conn, $sql)) {
    // echo "Table Client created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}



        //create Claim table

$sql = "CREATE TABLE IF NOT EXISTS  Claim (
  ClaimId INT(50)  AUTO_INCREMENT PRIMARY KEY,
  descriptions VARCHAR(255) NOT NULL,
  DateDeClaim VARCHAR(255) NOT NULL,
  ArticleId INT(50),
  FOREIGN KEY (ArticleId) REFERENCES Article(ArticleId)
)";

if (mysqli_query($conn, $sql)) {
    // echo "Table Claim created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


        // create Prime table


$sql = "CREATE TABLE IF NOT EXISTS  Prime (
  PrimeId INT(50)  AUTO_INCREMENT PRIMARY KEY,
  Montant VARCHAR(255) NOT NULL,
  DateDePrime VARCHAR(255) NOT NULL,
  ClaimId INT(50),
  FOREIGN KEY (ClaimId) REFERENCES Claim(ClaimId)
 
)";

if (mysqli_query($conn, $sql)) {
    // echo "Table Prime created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
