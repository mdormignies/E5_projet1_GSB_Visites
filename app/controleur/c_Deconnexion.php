<?php
@session_start();

session_destroy();

// Rediriger vers la page d'accueil ou une autre page après la déconnexion
header("Location: ../index.php?action=init");
exit();

?>