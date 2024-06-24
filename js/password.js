
function verifierMotsDePasse() {
    var nouveauMotDePasse = document.getElementById('password_2').value;
    var confirmationMotDePasse = document.getElementById('password_3').value;
    var erreurMotDePasse = document.getElementById('erreurMotDePasse');
    var successMessage = document.getElementById('successMessage');

    // Réinitialiser le message d'erreur
    erreurMotDePasse.textContent = '';

    if (nouveauMotDePasse !== confirmationMotDePasse) {
        erreurMotDePasse.textContent = "Les mots de passe ne correspondent pas, veuillez reesayer";
        return false; // Empêche la soumission du formulaire
    }

    else {
        successMessage.textContent = "Votre mot de passe a été mis à jour avec succès";
    
    return true; // Les mots de passe correspondent, le formulaire peut être soumis

    }
}