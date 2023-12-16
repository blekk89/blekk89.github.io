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
$genre = $_REQUEST['genre'];
$region = $_REQUEST['region'];
$departement = $_REQUEST['addresse'];
$profession = $_REQUEST['profession'];
$cin = $_REQUEST['cin'];
$numero_tel = $_REQUEST['numero_tel'];


// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}
$id_citizen = substr($nom, 1, 3) || substr($prenom, 1, 3) || substr($nom_mere, 1, 3) || substr($nom_pere, 1, 3) || substr($genre, 1, 3) || substr($region, 1, 3) || substr($departement, 1, 3) || substr($cin, 1, 10);

$sql = "INSERT INTO citoyen(ID_citizen,Nom,Prenom,Nom_mere,Nom_pere,Addresse,Genre,Region,Departement,Profession,Cin,Numero_Tel) VALUES 
	('$id_citizen', '$nom', '$prenom','$nom_mere','$nom_pere','$adresse','$genre','$region','$departement','$profession','$cin ','$numero_tel')";

if ($conn->query($sql) === TRUE) {
	echo "record inserted successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


 
// Closing the connection.
$conn->close();
 
?>