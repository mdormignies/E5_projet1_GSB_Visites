<html>
<head>
 <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
 <link href="../style.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
<div class="container">
    <form name="ChercherDate" action="../index.php?action=chercher&table=rapport" method="post" enctype='application/x-www-form-urlencoded'>
        <div class="row">
            <h5>Recherche de rapport</h5>
            <div class="input-field col s10">
                <input type='date' id="ChercherDate" name='ChercherDate' class="datepicker" required>
                <label for="ChercherDate">Date :</label>
            </div>
            <div class="col s2">
                <button class='btn waves-effect waves-light' type='submit'>Rechercher</button>
            </div>
            <p id="errorMessage" class="red-text text-darken-2"></p>
        </div>
    </form>
</div>
<!-- Ajout de Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

<script>
    document.getElementById('ChercherDate').addEventListener('input', function () {
        var inputDate = this.value;
        var errorMessage = document.getElementById('errorMessage');

        // Vérification de la validité de la date
        if (inputDate && !isValidDate(inputDate)) {
            errorMessage.textContent = 'Date invalide. Veuillez saisir une date au format AAAA-MM-JJ.';
        } else {
            errorMessage.textContent = '';
        }
    });

    // Fonction pour vérifier la validité de la date
    function isValidDate(dateString) {
        var regex = /^\d{4}-\d{2}-\d{2}$/;
        return regex.test(dateString);
    }
</script>