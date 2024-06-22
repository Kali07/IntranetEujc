<?php
// Fonction pour vérifier si l'utilisateur est connecté
function checkUserLoggedIn() {
    session_start();
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        header('Location: index.php');
        exit;
    }
}


?>