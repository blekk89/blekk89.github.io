<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anagrafica_sn";
$id_citizen = "00424";
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

$sql = "INSERT INTO citoyen(ID_citizen,Nom,Prenom,Nom_mere,Nom_pere,Addresse,Genre,Region,Departement,Profession,Cin,Numero_Tel) VALUES 
	('$id_citizen', '$nom', '$prenom','$nom_mere','$nom_pere','$adresse','homme','dakar','guediawaye','it','00123458','33965242')";

if ($conn->query($sql) === TRUE) {
	echo "record inserted successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


 
// Closing the connection.
$conn->close();
 
?>