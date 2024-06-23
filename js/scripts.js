function toggleProfile() {
    const profileInfo = document.getElementById('profile-info');
    profileInfo.style.display = profileInfo.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('DOMContentLoaded', function() {
    
    // Fonction pour afficher/masquer le formulaire
    function toggleForm() {
        const formContainer = document.getElementById("eventFormContainer");
        if (formContainer) {
            console.log("Toggling form visibility");
            formContainer.classList.toggle("hidden");
        }
    }

    // Rendez la fonction accessible globalement pour l'utiliser dans l'attribut onclick
    window.toggleForm = toggleForm;

    // Ajout des événements pour les autres sections
    const notesBtn = document.getElementById('notes');
    if (notesBtn) {
        notesBtn.addEventListener('click', () => {
            loadContent('includes/load_notes.php', 'content');
        });
    }

    const qcmBtn = document.getElementById('qcm');
    if (qcmBtn) {
        qcmBtn.addEventListener('click', () => {
            loadContent('includes/load_qcm.php', 'content');
        });
    }

    const stationsBtn = document.getElementById('stations');
    if (stationsBtn) {
        stationsBtn.addEventListener('click', () => {
            loadContent('includes/load_stations.php', 'content');
        });
    }

    const evenementBtn = document.getElementById('evenement');
    if (evenementBtn) {
        evenementBtn.addEventListener('click', () => {
            loadContent('includes/load_evenements.php', 'content');
        });
    }
});

// Fonction pour charger le contenu via AJAX
function loadContent(url, targetElementId) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById(targetElementId).innerHTML = data;
        })
        .catch(error => console.error('Error loading content:', error));
}
