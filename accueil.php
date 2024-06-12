<?php
session_start();

//empecher d'arriver sur cette page si on est pas connecté
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: index.php');  // Rediriger vers la page de connexion
    exit; 
}

//echo  $_SESSION['nom'];



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
        <?php
            if($_SESSION['sexe'] == "Femme"){ ?>
                
        <img src="https://img.icons8.com/?size=100&id=23290&format=png&color=000000" alt="Photo de profil" class="profile-pic-large">
        <?php 
        } else { ?>
        <img src="https://img.icons8.com/?size=100&id=23293&format=png&color=000000" alt="Photo de profil" class="profile-pic-large">
       <?php } ?>

		<h2><?=$_SESSION['nom']?> <?=$_SESSION['prenom']?></h2>
        <p><b>Email :</b> <?=$_SESSION['email']?></p>
        <p><b>Téléphone :</b> <?=$_SESSION['telephone']?></p>
        <form action="logout.php" method="POST">
            <button class="profile-button" type="submit">Deconnexion</button>
        </form>    
    </div>


    <script>
        function toggleProfile() {
            const profileInfo = document.getElementById('profile-info');
            profileInfo.style.display = profileInfo.style.display === 'block' ? 'none' : 'block';
        }

        document.getElementById('notes').addEventListener('click', () => {
            document.getElementById('content').innerHTML = `
                <h1>Notes</h1>
                <textarea placeholder="Prenez vos notes ici..." style="width: 100%; height: 200px;"></textarea>
            `;
        });

        document.getElementById('qcm').addEventListener('click', () => {
            document.getElementById('content').innerHTML = `
                <h1>QCM</h1>
                <p>Cette section sera dédiée aux QCM.</p>
            `;
        });

        document.getElementById('stations').addEventListener('click', () => {
            document.getElementById('content').innerHTML = `
                <h1>Stations</h1>
                <p>Cette section sera dédiée aux stations.</p>
            `;
        });
    </script>
</body>
</html>
