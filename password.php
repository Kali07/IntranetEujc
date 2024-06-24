<?php 
session_start();
require 'data.php';


$email = $_POST['email'];


$password_1 = $_POST['password_1'];

$password_2 = $_POST['password_2'];

$password_3 = $_POST['password_3'];




if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {



$query = $data->prepare("SELECT * FROM users WHERE  email = :email AND mot_de_passe = :password_1 " );


$query->bindParam(':email', $email);

$query->bindParam(':password_1', $password_1);


    $query->execute();
  
    $result = $query->fetch();


if($result){




if($password_3){


    $query = $data->prepare ("UPDATE users SET mot_de_passe = :password_3 WHERE email = :email");

    $query->bindParam(':password_3', $password_3);
    $query->bindParam(':email', $email);

    $query->execute();

    echo "Mot de passe sauvegardé";    

}

} else{

    echo "votre email ou mot de passe n'existe pas dans la base de données ";
}


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
<label for="email"> Email</label>
<input type="email" name="email" required><br><br>

<label for="password_1"> Ancien Mot de passe</label>
<input type="password" name="password_1"  required><br><br>

<label for="password_2"> Nouveau Mot de passe</label>
<input type="password" id="password_2" name="password_2"  required><br><br>
<p>confirmez le mot de passe</p>

<input type="password" id="password_3" name="password_3"  required><br><br>

<p id="erreurMotDePasse" style="color: red;"></p>

<button type="submit" name="submit">Enregistrer</button>

</form>

</body>
</html>



