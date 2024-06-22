<?php
echo '<p>Cette section sera dédiée aux EVENEMENTS.</p>';
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
    <div class="event-block">
        <img src="img/elv1.png" alt="Event 1" class="event-image">
        <div class="event-details">
            <h3>Event 1</h3>
            <p>Date: 2024-06-30</p>
        </div>
    </div>
    <div class="event-block">
        <img src="img/elv1.png" alt="Event 2" class="event-image">
        <div class="event-details">
            <h3>Event 2</h3>
            <p>Date: 2024-07-15</p>
        </div>
    </div>
    <!-- More event blocks here -->
    <div class="event-block add-event">
        <button class="add-button" id="toggleFormBtn" onclick="toggleForm()">+</button>
    </div>
</div>

<!-- Formulaire caché -->
<div id="eventFormContainer" class="hidden">
    <form id="eventForm">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="id_user">ID Utilisateur:</label>
        <input type="text" id="id_user" name="id_user" required>

        <label for="id_type_event">Type d'événement:</label>
        <select id="id_type_event" name="id_type_event" required>
            <?php
            // Assurez-vous d'inclure la logique pour récupérer les types d'événements depuis votre base de données
            // Exemple fictif :
            $types = ["Type 1", "Type 2", "Type 3"];
            foreach ($types as $type) {
                echo "<option value='$type'>$type</option>";
            }
            ?>
        </select>

        <button type="submit">Ajouter Événement</button>
    </form>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
