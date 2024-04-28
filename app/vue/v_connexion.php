<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connectez-vous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            padding-top: 50px;
        }
        .envoi {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Connectez-vous</h1>
    <form name="form_login" action="../index.php?action=controleLogin" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <div class="input-field">
                <input id="login" type="text" name="login" class="validate" required>
                <label for="login">Login</label>
            </div>
            <div class="input-field">
                <input id="mdp" type="password" name="mdp" class="validate" required>
                <label for="mdp">Password</label>
            </div>
            <div class="envoi">
                <input type="submit" class="btn" value="Se connecter">
            </div>
        </fieldset>
    </form>
    <div>
        <p>Vous n'avez pas de compte ? <a href="v_inscription.php">Inscrivez-vous</a></p>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
