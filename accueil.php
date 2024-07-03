<?php
include 'fonctions.php';
// Empêcher d'arriver sur cette page si on n'est pas connecté
checkUserLoggedIn();


//gestion des events
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_event'])) {
    
    
    $nom = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $idUtilisateur = $_SESSION['id_user'];
    $idTypeEvent = $_POST['id_type_event'];
    $type_event = getTypeEventById($idTypeEvent);
    $id_evenement = generateUniqueIdEvents($type_event['label']);

    

insererEvenement($id_evenement,$nom, $description, $date, $idUtilisateur, $idTypeEvent);
//headerlocation(accueil.php);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" href="css/accueil.css">
</head>
<body>
    <div class="sidebar">
        <div class="menu-item" id="stations">
            <i class="icon">🚉</i> Stations
        </div>
        <div class="menu-item" id="notes">
            <i class="icon">📝</i> Notes
        </div>
        <div class="menu-item" id="qcm">
            <i class="icon">📋</i> QCM
        </div>
        <div class="menu-item" id="evenement">
            <i class="icon">📋</i> EVENEMENT
        </div>
    </div>
    <div class="main-content">
        <header>
            <button class="profile-button" onclick="toggleProfile()">Profil Utilisateur</button>
        </header>
        <div class="content" id="content">
            <!-- Le contenu sera chargé ici -->
        </div>
    </div>
    <div class="profile-info" id="profile-info">
        <?php if ($_SESSION['sexe'] == "Femme") { ?>
            <img src="https://img.icons8.com/?size=100&id=23290&format=png&color=000000" alt="Photo de profil" class="profile-pic-large">
        <?php } else { ?>
            <img src="https://img.icons8.com/?size=100&id=23293&format=png&color=000000" alt="Photo de profil" class="profile-pic-large">
        <?php } ?>
        <h2><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></h2>
        <p><b>Email :</b> <?= $_SESSION['email'] ?></p>
        <p><b>Téléphone :</b> <?= $_SESSION['telephone'] ?></p>
        <form action="logout.php" method="POST">
            <button class="profile-button" type="submit">Déconnexion</button>
        </form>    
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>
