<?php
include("v_zoneLogin.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Grégoire Maréchal">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Ajouter Médecin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<div class="container">
    <h1>Formulaire de saisie</h1>
    <div class="row">
        <form name="ajouterMedecin" action="../index.php?action=ajouter&table=medecin" method="post" enctype="application/x-www-form-urlencoded" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="nom" type="text" name="nom" class="validate" required>
                    <label for="nom">Le nom</label>
                </div>
                <div class="input-field col s6">
                    <input id="prenom" type="text" name="prenom" class="validate" required>
                    <label for="prenom">Le prénom</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="adresse" type="text" name="adresse" class="validate" required>
                    <label for="adresse">L'adresse</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="cp" type="text" name="cp" class="validate" required>
                    <label for="cp">Le code postal</label>
                </div>
                <div class="input-field col s8">
                    <input id="ville" type="text" name="ville" class="validate" required>
                    <label for="ville">La ville</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="tel" type="text" name="tel" class="validate" required>
                    <label for="tel">Le numéro de téléphone</label>
                </div>
                <div class="input-field col s6">
                    <input id="specialite" type="text" name="specialite" class="validate" required>
                    <label for="specialite">La spécialité complémentaire</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="departement" type="text" name="departement" class="validate" required>
                    <label for="departement">Le département</label>
                </div>
                <div class="input-field col s6">
                    <input id="mail" type="email" name="mail" class="validate" required>
                    <label for="mail">Mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" value="Ajouter" class="btn">
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
