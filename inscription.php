<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anagrafica_sn";
$nom =  $_REQUEST['nom'];
$prenom= $_REQUEST['prenom'];
$nom_mere =  $_REQUEST['nom_mere'];
$nom_pere = $_REQUEST['nom_pere'];
$adresse = $_REQUEST['addresse'];
$genre = "homme";
$region = $_REQUEST['region'];
$departement = $_REQUEST['addresse'];
$profession = $_REQUEST['profession'];
$cin = $_REQUEST['cin'];
$numero = $_REQUEST['numero'];
$email = $_REQUEST['email'];
$session = $_REQUEST['email'];
$password = $_REQUEST['password'];



//creation identifiant unique citizen trandformation uppercase
$id_citizen = strtoupper( substr($nom, 1, 3) .substr($cin, 1, 3) .substr($prenom, 1, 3) .substr($nom_mere, 1, 3) .substr($cin, 4, 7) .substr($region, 0, 4) .substr($departement, 0, 3) .substr($genre, 0, 3) ."SN");


// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}

// insertion db
$sql = 

strtoupper("INSERT INTO citoyen(ID_citizen,Nom,Prenom,Nom_mere,Nom_pere,Addresse,Genre,Region,Departement,Profession,Cin,Numero_Tel,Email) VALUES 
	('$id_citizen', '$nom', '$prenom','$nom_mere','$nom_pere','$adresse','$genre','$region','$departement','$profession','$cin ','$numero','$email')");


$sql2 = "INSERT INTO utilisateur(ID_session,Nom,Prenom,Email,ID_citizen,password,Data) VALUES 
		('$session', '$nom', '$prenom','$email','$id_citizen','$password','date')";

if ($conn->query($sql) === TRUE) {
	echo "<h1> Felicitation $nom $prenom votre enregistrement a été effectué avec succés.<br>
	votre ID unique est le $id_citizen</h1>  " ;
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


 
// Closing the connection.

$conn->close();
 
?>