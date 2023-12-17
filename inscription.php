
<!DOCTYPE html>
<!-- tag important pour les frameworks by mame magal-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/style.css">
        
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    
    
    <style>
	body {
		margin-top:50px;
		padding:auto;
		}
		
		
		
		
	div {
		border:double #6508bd;
		padding: 30px;	
		text-align:center;
		 line-height: 2em;
		}	
		
	h2 {
		
	color: #6508bd;
		}	
		
		
	
	</style>
    </head>
    
    <body>
    <div>
    <p><a href="index.html"><img src="img/logo-png-akn.png" width="141" height="89" class=".img-fluid "></a></p>
   
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
$user = $_REQUEST['email'];
$session = "blekksSNTEST";
$password2 = $_REQUEST['password'];



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

// query a controller ca ne fonctionne pas
$sql2 = "INSERT INTO utilisateur(ID_session,Nom,Prenom,user,ID_citizen,password,Data) VALUES 
		('$session', '$nom', '$prenom','$user','$id_citizen','$password2','date')";

if ($conn->query($sql) === TRUE) {
	echo " Bienvenue sur notre plateforme <h2>$nom $prenom</h2> Dalal Ak Jamm
	votre enregistrement a été effectué avec succés.
	votre ID unique est le suivant : <h2>$id_citizen</h2>
	Merci de votre confiance, veuillez suuivre le lien ci dessous pour acceder à votre compte et découvrir nos nombreux services. " ;
	
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


 
// Closing the connection.

$conn->close();
 
?>
    
  </div>  
    
    
</body>
    
    </html>
















