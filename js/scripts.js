function toggleProfile() {
    const profileInfo = document.getElementById('profile-info');
    profileInfo.style.display = profileInfo.style.display === 'block' ? 'none' : 'block';
}

function loadContent(url, targetElementId) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById(targetElementId).innerHTML = data;
        })
        .catch(error => console.error('Error loading content:', error));
}

document.getElementById('notes').addEventListener('click', () => {
    loadContent('includes/load_notes.php', 'content');
});

document.getElementById('qcm').addEventListener('click', () => {
    loadContent('includes/load_qcm.php', 'content');
});

document.getElementById('stations').addEventListener('click', () => {
    loadContent('includes/load_stations.php', 'content');
}); 

document.getElementById('evenement').addEventListener('click', () => {
    loadContent('includes/load_evenements.php', 'content');
}); 



document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour ouvrir le modal
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    // Fonction pour fermer le modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Ajouter les événements pour ouvrir et fermer le modal
    document.getElementById("openModalBtn").addEventListener("click", openModal);
    document.querySelector(".close").addEventListener("click", closeModal);

    // Fermer le modal si l'utilisateur clique en dehors de celui-ci
    window.addEventListener("click", function(event) {
        if (event.target == document.getElementById("myModal")) {
            closeModal();
        }
    });
});
