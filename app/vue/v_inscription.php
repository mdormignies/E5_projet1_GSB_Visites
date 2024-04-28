<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscrivez-vous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<div class="container">
    <h1>Inscrivez-vous</h1>
    <form name="InscriptionVisiteur" action="../index.php?action=inscription" method="post" enctype="application/x-www-form-urlencoded">
        <div class="row">
            <div class="input-field col s12">
                <input id="nom" type="text" name="nom" class="validate" required>
                <label for="nom">Votre nom :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="prenom" type="text" name="prenom" class="validate" required>
                <label for="prenom">Votre prénom :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="login" type="text" name="login" class="validate" required>
                <label for="login">Votre login :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="mdp" type="password" name="mdp" class="validate" required>
                <label for="mdp">Votre mot de passe :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="adresse" type="text" name="adresse" class="validate" required>
                <label for="adresse">Votre adresse :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="cp" type="text" name="cp" class="validate" required>
                <label for="cp">Votre code postal :</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="ville" type="text" name="ville" class="validate" required>
                <label for="ville">Votre ville :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="tel" type="text" name="tel" class="validate" required>
                <label for="tel">Votre numéro de téléphone :</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="dateEmbauche" type="date" name="dateEmbauche" class="validate" required>
                <label for="dateEmbauche">Date d'embauche :</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="submit" class="btn" value="Ajouter">
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
