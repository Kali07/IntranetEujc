function verifierMotsDePasse() {
    var nouveauMotDePasse = document.getElementById('password_2').value;
    var confirmationMotDePasse = document.getElementById('password_3').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');
    var successMessage = document.getElementById('successMessage');

    // Réinitialiser le message d'erreur
    erreurMotDePasse.textContent = '';

    if (nouveauMotDePasse !== confirmationMotDePasse) {
        erreurMotDePasse.textContent = "Les mots de passe ne correspondent pas, veuillez réessayer";
        return false; // Empêche la soumission du formulaire
    }
}