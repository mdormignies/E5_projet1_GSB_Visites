<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GSB Visites</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <a href="../index.php?action=init" class="brand-logo">
            <img class="responsive-img" src="../autres/logo.png" alt="Logo" style="margin-left: 20px; height: 64px; width: auto;">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php
            @session_start(); // le @ masque une éventuelle erreur
            if(isset($_SESSION['login'])) {
                echo "<li>User: " . $_SESSION['login'] . " |</li>";
                echo "<li>| ID: " . $_SESSION['idvisiteur'] . "</li>";
                echo "<li><a href='../index.php?action=deconnexion'>Se déconnecter</a></li>";
            } else {
                header("Location: v_pasdecompte.php"); // redirection vers la page d'accueil
                exit(); // interruption après redirection
            }
            ?>
        </ul>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
