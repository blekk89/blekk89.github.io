<?php

$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "anagrafica_sn";
$nom =  $_REQUEST['nom'];
$prenom= $_REQUEST['prenom'];
$nom_mere =  $_REQUEST['nom_mere'];
$nom_pere = $_REQUEST['nom_pere'];
$adresse = $_REQUEST['addresse'];

// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}

$sqlquery = "INSERT INTO Citoyen VALUES 
	('$nom', 
            '$prenom','$nom_mere','$nom_pere','$adresse')";

if ($conn->query($sql) === TRUE) {
	echo "record inserted successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // collect value of input field
    $data = $_REQUEST['val1'];
 
    if (empty($data)) {
        echo "data is empty";
    } else {
        echo $data;
    }
}

 
// Closing the connection.
$conn->close();
 
?>