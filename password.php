<?php 
session_start();
require 'data.php';

//Recuperation de l'Id utilisateur

$idUser = $_SESSION['id_user'];

//Recuperation des infos liées à l'Id utilisateur

$query = $data->prepare("SELECT * FROM users WHERE  id_user = :id" );

$query->bindParam(':id', $idUser);
$query->execute();
$results = $query->fetch();



if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {



$password_1 = $_POST['password_1'];

$password_2 = $_POST['password_2'];

$password_3 = $_POST['password_3'];



if($password_3){


    $query = $data->prepare ("UPDATE users SET mot_de_passe = :password_3 WHERE id_user = :id_user");

    $query->bindParam(':password_3', $password_3);
    $query->bindParam(':id_user', $idUser);

    $query->execute();

    echo "Mot de passe sauvegardé";  
    
   // header('Location: accueil.php');

}

} else{

    echo "votre email ou mot de passe n'existe pas dans la base de données ";
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Changement de Mot de Passe</title>
<link rel="stylesheet" href="css/password.css">
<script src="js/password.js"></script>
</head>
<body>

<br><br><br><br><br><br><br><br>

<form action="" method="POST" onsubmit="return verifierMotsDePasse()">


<label for="password_1"> Ancien Mot de passe</label>

<input type="password" id="password_1" name="password_1"  required><br><br>

<label for="password_2"> Nouveau Mot de passe</label>

<input type="password" id="password_2" name="password_2"  required><br><br>

<p>confirmez le mot de passe</p>

<input type="password" id="password_3" name="password_3"  required><br><br>

<p id="erreurMotDePasse" style="color: red;"></p>

<button type="submit" name="submit">Enregistrer</button>

</form>

</body>
</html>



