<?php
include("v_zoneLogin.php");

if(isset($_GET['table']) ) // pas de nom de table
{
  $table=$_GET['table'];
}
// Form de recherche en focntion de la table affichée
if ($table=='rapport') {
    include ('../vue/v_chercherdate.php');
}
if ($table=='medecin') {
    include ('../vue/v_cherchernom.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
        <title>Liste des données</title>
        <link href="../style.css" type="text/css" rel="stylesheet" media="all">
            <!-- Ajout de Materialize CSS -->
            <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
                <style>
                    /* Style pour la table */
                    table.striped {
                        width: 100%;
                        /* Largeur de la table */
                        border-collapse: collapse;
                        /* Fusion des bordures des cellules */
                    }

                    /* Style pour les en-têtes de la table */
                    table.striped th {
                        background-color: #f2f2f2;
                        /* Couleur de fond */
                        color: #333;
                        /* Couleur du texte */
                        font-weight: bold;
                        /* Texte en gras */
                        padding: 10px;
                        /* Marge interne */
                        border: 1px solid #ddd;
                        /* Bordure */
                    }

                    /* Style pour les cellules de la table */
                    table.striped td {
                        padding: 10px;
                        /* Marge interne */
                        border: 1px solid #ddd;
                        /* Bordure */
                    }

                    /* Style pour les liens dans la table */
                    table.striped a {
                        color: #039be5;
                        /* Couleur des liens */
                        text-decoration: none;
                        /* Pas de soulignement */
                    }

                    /* Changement de couleur au survol des liens */
                    table.striped a:hover {
                        color: #0288d1;
                        /* Couleur au survol */
                    }
                </style>
</head>
<body>
<table class="striped"> <!-- Utilisation de la classe striped pour les lignes alternées -->
    <?php
    // comme on fait "include" les données viennent de la page mère
    $table = $this->_table;
    $entete = $this->_donnees[0]; // récupère les en-têtes
    echo "<thead><tr>"; // Ajout de l'en-tête de la table
    foreach ($entete as $titrecolonne => $valeur) {
        echo "<th>";
        echo '<a href="../index.php?action=liste&table=' . $table . '&tri=' . $titrecolonne . '">' . $titrecolonne . '</a>';
        echo "</th>";
    }
    echo "</tr></thead><tbody>";

    foreach ($this->_donnees as $uneLigne) {
        echo "<tr>";
        foreach ($uneLigne as $cle => $valeur) {
            echo "<td>";
            if ($cle === 'idmedecin' || $cle === 'idrapport') {
                echo '<a href="../index.php?action=selectionner&table=' . $table . '&' . $cle . '=' . $valeur . '">' . $valeur . '</a>';
            } elseif ($cle === 'mail') {
                echo '<a href="mailto:' . $valeur . '">' . $valeur . '</a>';
            } else {
                echo $valeur;
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    ?>
</table>
</body>
</html>