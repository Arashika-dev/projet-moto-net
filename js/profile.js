"use strict";

"use strict";

// Sélection du bouton "Modifier" par son ID
const modifierBtn = document.getElementById('modifierBtn');

// Sélection des champs de formulaire à modifier
const fieldsToEnable = [
    document.getElementById('pseudo'),
    document.getElementById('firstName'),
    document.getElementById('lastName'),
    document.getElementById('email'),
    document.getElementById('password')
];

// Fonction pour activer les champs de formulaire
function enableFields() {
    for (const field of fieldsToEnable) {
        field.removeAttribute('disabled');
    }
}

// Fonction pour afficher les champs de formulaire en retirant la classe d-none
function displayFields() {
    const fieldsToDisplay = document.querySelectorAll('.d-none');
    for (const field of fieldsToDisplay) {
        field.classList.remove('d-none');
    }
}


// Écouteur d'événement pour le clic sur le bouton "Modifier"
modifierBtn.addEventListener('click', function (event) {
    event.preventDefault(); // Empêche le formulaire de se soumettre
    enableFields(); // Active les champs de formulaire
    displayFields(); // Affiche les champs de formulaire en retirant la classe d-none
    modifierBtn.classList.toggle('d-none');
    
});
