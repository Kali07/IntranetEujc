<?php 
session_start();
require 'data.php';


$id = $_SESSION['id_user'];



//Recuperations de toutes les informations dans la bdd 

$query = $data->prepare("SELECT * FROM users WHERE id_user = :id_user  " );
$query->bindParam(':id_user', $id);


$query->execute();
  
$users = $query->fetchAll(); 





if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {

 
    
        header('Location: password.php');
    
        
    
    }
    

foreach($users as $user){



?>




<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="css/dataCompte.css">

</head>
<body>




    
    <div class="user-container">
    <h2>Informations de L'utilisateur</h2>
    <div class="user-info">
    <label>Nom :</label>  <?= $user['nom']?><br><br>
    <label>Prenom :</label> <?=$user['prenom']?> <br><br>
    <label>Sexe :</label> <?=$user['sexe']?><br><br>
    <label>Date de Naissance :</label> <?=$user['date_naissance']?> <br><br>
    <label>Email :</label> <?=$user['email']?><br><br>
    <label>Adresse :</label> <?=$user['adresse']?><br><br>
    <label>Tel :</label> <?=$user['telephone']?><br><br>

    <br><br><br>


    <form method="POST" action="">

      <button type="submit" name="submit" > Changer Mot de passe </button>

    </form>
    
    
    </div>
    </div>

<?php }?>


</body>
</html>