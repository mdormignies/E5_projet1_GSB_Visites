<?php
include("v_zoneLogin.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet" media="all">
</head>

<body>

<p><table>
    <?php
    // comme on fait "include" les données viennent de la page mère
    $table = $this->_table;
    $entete = $this->_donnees[0]; // récupère les en-têtes

    echo "<tr>";
    foreach ($entete as $titrecolonne => $valeur) {
        echo "<td>";
        echo "$titrecolonne";
        echo "</td>";
    }
    echo "</tr>";

    foreach ($this->_donnees as $uneLigne) {
        echo "<tr>";
        foreach ($uneLigne as $cle => $valeur) {
            echo "<td>";
            echo "$valeur";
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table></p>

<!-- Formulaire de modification -->
<div class="container">
    <div class="row">
        <form class="col s12" action="../index.php?action=modifier" method="post">
            <h2>Modifier les données</h2>
            <div class="row">
                <?php
                foreach ($entete as $titrecolonne => $valeur) {
                    // Vérifier si le titre de la colonne est 'idrapport', 'idvisiteur' ou 'idmedecin'
                    if ($titrecolonne === 'idrapport' || $titrecolonne === 'idvisiteur' || $titrecolonne === 'idmedecin' || $titrecolonne === 'date') {
                        echo "<input type='hidden' name='$titrecolonne' value='" . $uneLigne->$titrecolonne . "'>";
                    } else {
                        echo "<div class='input-field col s12'>";
                        echo "<input type='text' id='$titrecolonne' name='$titrecolonne' value='" . $uneLigne->$titrecolonne . "'>";
                        echo "<label for='$titrecolonne' class='active'>$titrecolonne</label>"; // Ajout de la classe active pour afficher le label
                        echo "</div>";
                    }
                }
                ?>
                <?php echo "<input type='hidden' name='TableModifier' value='$table'>"; ?>
            </div>
            <button class='btn waves-effect waves-light' type='submit'>Modifier</button>
        </form>
    </div>
</div>

</body>
</html>

