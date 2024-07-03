<?php
include '../fonctions.php';
session_start();

echo '<p>Cette section sera dédiée aux EVENEMENTS.</p>';
$events = getAllEvents();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>
    <link rel="stylesheet" href="css/evenement.css">
</head>
<body>

<h1>EVENEMENTS</h1>
<div class="events-container">
<?php foreach ($events as $event) { ?>
    <div class="event-block">
        <img src="img/elv1.png" alt="Event 1" class="event-image">
        <div class="event-details">
            <h3><?=$event['nom']?></h3>
            <p><?=$event['date_event']?></p>
        </div>
    </div>
    <?php } 
        if($_SESSION['id_role'] > 1){
    ?> 
    <!-- More event blocks here -->
    <div class="event-block add-event">
        <button class="add-button" id="toggleFormBtn" onclick="toggleForm()">+</button>
    </div>
    <?php } 
    
    ?> 
</div>

<!-- Formulaire caché -->
<div id="eventFormContainer" class="hidden">
    <form id="eventForm" method="POST" action="">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="id_user">ID Utilisateur:</label>
        <input type="text" id="id_user" name="id_user" value="<?=$_SESSION['nom']?>" readonly>


        <label for="id_type_event">Type d'événement:</label>
        <select id="id_type_event" name="id_type_event" required>
            <?php
            $types = getAllTypeEvent();
            foreach ($types as $type) {
                echo "<option value='" . htmlspecialchars($type['id_type_event']) . "'>" . htmlspecialchars($type['label']) . "</option>";
            }
            ?>
        </select>

        <button name="submit_event" type="submit">Ajouter Événement</button>
    </form>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
