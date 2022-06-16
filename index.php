<?php
require_once 'controller/form-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form GET</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <h1 class="m-5 text-center">Formulaire de contact</h1>

    <!-- utilisation de la balise form : action et method  -->
    <form action="" method="POST">

        <div class="row justify-content-center">
            <div class="col-4 border border-secondary rounded shadow p-4">

                <div class="my-2">
                    <!-- Nous effectuons une ternaire pour afficher le message d'erreur dans le span -->
                    <label for="lastname">Nom</label><span class="ms-2 text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                    <br>
                    <!-- Je mets en place une ternaire dans la value pour conserver la valeur en cas d'erreur -->
                    <input type="text" id="lastname" name="lastname" placeholder="ex. DURANT" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
                </div>

                <div class="my-2">
                    <label for="firstname">Prénom</label><span class="ms-2 text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                    <br>
                    <input type="text" id="firstname" name="firstname" placeholder="ex. Jean" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
                </div>

                <div class="my-2">
                    <label for="mail">Courriel</label><span class="ms-2 text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                    <br>
                    <input type="mail" id="mail" name="mail" placeholder="ex. jean.durant@mail.fr" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
                </div>

                <div class="my-2">
                    <label for="password">Mot de passe</label><span class="ms-2 text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                    <br>
                    <input type="password" id="password" name="password">
                </div>

                <div class="my-2">
                    <label for="confirmPassword">Confirmation du mot de passe</label><span class="ms-2 text-danger"><?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '' ?></span>
                    <br>
                    <input type="password" id="confirmPassword" name="confirmPassword">
                </div>

                <div class="my-2">
                    <label for="formula">Abonnement</label><span class="ms-2 text-danger"><?= isset($errors['formula']) ? $errors['formula'] : '' ?></span>
                    <br>
                    <select name="formula" id="formula">
                        <option selected disabled>Veuillez sélectionner une formule</option>
                        <!-- Mise en place d'une ternaire pour conserver le selected -->
                        <!-- Nous vérifions si le $_POST formula est set et s'il est égale à value -->
                        <option value="1" <?= isset($_POST['formula']) && $_POST['formula'] == 1 ? 'selected' : '' ?> >Etudiant</option>
                        <option value="2" <?= isset($_POST['formula']) && $_POST['formula'] == 2 ? 'selected' : '' ?> >Normal</option>
                        <option value="3" <?= isset($_POST['formula']) && $_POST['formula'] == 3 ? 'selected' : '' ?> >Premium</option>
                    </select>
                </div>

                <div class="mt-4">
                    <input type="checkbox" id="cgu" name="cgu">
                    <label for="cgu">J'ai lu et j'accepte les CGU</label>
                </div>

                <button class="btn btn-dark my-3">Valider</button>

            </div>
        </div>

    </form>
</body>

</html>