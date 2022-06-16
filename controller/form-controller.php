<?php

var_dump($_POST);

// 1 - je lance mes tests uniquement lors de la validation du formulaire de type POST
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

    ////////////////////////////////
    // Contrôle du champ firstname //
    ////////////////////////////////

    if (isset($_POST['firstname'])) {
        if ($_POST['firstname'] == '') {
            $errors['firstname'] = "Champ obligatoire";
        } else if (!preg_match($regexName, $_POST['firstname'])) {
            $errors['firstname'] = "Format invalide";
        }
    }

    ////////////////////////////////
    // Contrôle du champ email //
    ////////////////////////////////

    if (isset($_POST['mail'])) {
        if ($_POST['mail'] == '') {
            $errors['mail'] = "Champ obligatoire";
            // on contrôle le format du mail à l'aide d'un filtar_var et filter_validate_email
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Format mail invalide";
        }
    }

    ////////////////////////////////////////////////////////
    // Contrôle des champs : password et confirmpassword  //
    ////////////////////////////////////////////////////////

    if (isset($_POST['password'])) {
        // si password est vide
        if ($_POST['password'] == '') {
            $errors['password'] = "Champ obligatoire";
            // si confirmPassword est vide et que password n'est pas vide
        } else if ($_POST['confirmPassword'] == '' && $_POST['password'] != '') {
            $errors['confirmPassword'] = "Champ obligatoire";
            // si les mots de passe sont différents
        } else if ($_POST['confirmPassword'] != $_POST['password']) {
            $errors['password'] = "Les mots de passe sont différents";
        }
    }

    ////////////////////////////////////////////////////////
    // Contrôle du champ formula //
    ////////////////////////////////////////////////////////

    if (!isset($_POST['formula'])) {
        $errors['formula'] = "Veuillez sélectionner une formule";
    }
}
