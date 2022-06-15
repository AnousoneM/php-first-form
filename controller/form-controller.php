<?php

// 1 - Je lance mes tests uniquement lors de la validation du formulaire de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // je déclare un tableau d'erreurs vide pour stocker toutes mes erreurs
    $errors = [];

    // je déclare mes regex 
    $regexName = "/^[a-zA-Z]+$/";

    ////////////////////////////////
    // Contrôle du champ lastname //
    ////////////////////////////////

    // 2 - isset permet de vérifier que l'input lastname existe dans la superglobale POST
    if (isset($_POST['lastname'])) {

        // 3 - nous vérifions si le champ respectif est vide
        if ($_POST['lastname'] == '') {
            // si c vide, nous allons creer un clef dans le tableau d'erreurs
            $errors['lastname'] = "Champ obligatoire";
            // Nous utilison la fonction preg_match pour valider le format
        } else if (!preg_match($regexName, $_POST['lastname'])) {
            // si mauvais format, message d'erreur
            $errors['lastname'] = "Format invalide";
        }
    }
}
