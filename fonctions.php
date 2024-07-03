<?php
require 'data.php';
// Fonction pour vérifier si l'utilisateur est connecté
function checkUserLoggedIn() {
    session_start();
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        header('Location: index.php');
        exit;
    }
}

function generateUniqueIdEvents($label) {
    // Prendre les 3 premiers caractères du label
    $prefix = substr($label, 0, 3);
    // Générer 5 chiffres aléatoires
    $randomDigits = rand(10000, 99999);
    // Concaténer le préfixe et les chiffres aléatoires
    $uniqueId = strtoupper($prefix) . $randomDigits;
    return $uniqueId;
}

//Fonction permettant d'ajouter un nouvel evenement

function insererEvenement($id_evenement,$nom, $description, $date, $idUtilisateur, $idTypeEvent) {
    $data = getDatabaseConnection();

    $sql = "INSERT INTO evenements (id_evenement, nom, description_event, date_event, id_user, id_type_event) VALUES (:id_evenement,:nom, :description_event, :date_event, :id_user, :id_type_event)";

    try {
        $stmt = $data->prepare($sql);

        $stmt->bindParam(':id_evenement', $id_evenement, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':description_event', $description, PDO::PARAM_STR);
        $stmt->bindParam(':date_event', $date, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $idUtilisateur, PDO::PARAM_INT);
        $stmt->bindParam(':id_type_event', $idTypeEvent, PDO::PARAM_INT);

    
        $stmt->execute();

        return $data->lastInsertId();
    } catch (PDOException $e) {

        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

//recuperer tous les types d'evenement
function getAllTypeEvent() {

    $data = getDatabaseConnection();
    $sql = "SELECT * FROM type_event";

    try {
        $stmt = $data->prepare($sql);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

//recuperer un user via son ID
function getUserById($id) {

    $data = getDatabaseConnection();
    $sql = "SELECT * FROM users WHERE id_user = :id";

    try {
        $stmt = $data->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

//recuperer un un type d'event  via son ID
function getTypeEventById($id) {

    $data = getDatabaseConnection();
    $sql = "SELECT * FROM type_event WHERE id_type_event = :id";

    try {
        $stmt = $data->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultat;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

//recuperer tous les types d'evenement
function getAllEvents() {

    $data = getDatabaseConnection();
    $sql = "SELECT * FROM evenements";

    try {
        $stmt = $data->prepare($sql);
        $stmt->execute();
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultats;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}





?>