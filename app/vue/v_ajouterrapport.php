<?php
include("v_zoneLogin.php");
?>

<html>
<head>
<title>Mon annuaire en PHP</title>
 <meta NAME="Author" CONTENT="Grégoire Maréchal">
 <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <!-- appel feuille de style -->
 <link href="../style.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
<div class="container">
    <h1>Formulaire de saisie</h1>
    <form name="ajouterRapport" action="../index.php?action=ajouter&table=rapport" method="post" enctype='application/x-www-form-urlencoded'>
        <div class="row">
            <div class="input-field col s12">
                <select name="idmedecin">
                    <option value="" disabled selected>Choisir un médecin</option>
                    <?php
                    include '../modele/class ModeleDonnees.php';
                    $monModele = new ModeleDonnees();
                    $les_medecins = $monModele->selectQuelMedecin();
                    foreach ($les_medecins as $un_medecin) {
                        $idmedecin = $un_medecin['idmedecin'];
                        $nom = $un_medecin['nom'];
                        $prenom = $un_medecin['prenom'];
                        $specialite = $un_medecin['specialiteComplementaire'];
                        echo "<option value='$idmedecin'>Dr. $nom $prenom - $specialite</option>";
                    }
                    ?>
                </select>
                <label>Pour quel médecin ?</label>
                <a href='v_ajoutermedecin.php' class="btn-small right">Nouveau médecin ?</a>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select name="idmedicament">
                    <option value="" disabled selected>Choisir un médicament</option>
                    <?php
                    $les_medicaments = $monModele->selectQuelMedicament();
                    foreach ($les_medicaments as $un_medicament) {
                        $idmedicament = $un_medicament['idmedicament'];
                        $nomCommercial = $un_medicament['nomCommercial'];
                        $libelle = $un_medicament['libelle'];
                        echo "<option value='$idmedicament'>$nomCommercial - $libelle</option>";
                    }
                    ?>
                </select>
                <label>Donner un médicament ?</label>
            </div>
            <div class="input-field col s6">
                <select name="quantite">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label>Quantité</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input type='date' name='date' value='AAAA-MM-JJ'>
                <label>Date</label>
            </div>
            <div class="input-field col s6">
                <select name="motif">
                    <option value="Consultation Médicale Générale">Consultation Médicale Générale</option>
                    <option value="Suivi de Traitement">Suivi de Traitement</option>
                    <option value="Prescription de Médicaments Spécifiques">Prescription de Médicaments Spécifiques</option>
                    <option value="Vaccination et Soins Préventifs">Vaccination et Soins Préventifs</option>
                    <option value="Gestion de Maladies Chroniques">Gestion de Maladies Chroniques</option>
                    <option value="Présentation de Nouveaux Traitements ou Produits">Présentation de Nouveaux Traitements ou Produits</option>
                </select>
                <label>Motif</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="bilan" class="materialize-textarea"></textarea>
                <label for="bilan">Bilan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <?php
                $idvisiteur = $_SESSION['idvisiteur'];
                echo "<input type='text' style='border: none;' name='idvisiteur' value='$idvisiteur' readonly>";
                ?>
                <label for="idvisiteur">Votre ID visiteur</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class='btn waves-effect waves-light' type='submit'>Ajouter</button>
            </div>
        </div>
    </form>
</div>

<!-- Scripts Materialize -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    // Initialisation des éléments de Materialize
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>

</body>
</html>