<html>
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
	<link href="../style.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
	<div class="container">
		<form name="ChercherNom" action="../index.php?action=chercher&table=medecin" method="post" enctype='application/x-www-form-urlencoded'>
			<div class="row">
				<h5>Recherche de médecin</h5>
				<div class="input-field col s10"> <!-- Utilisation de la classe de grille pour occuper 10 colonnes sur 12 -->
					<input type="text" id="ChercherNom" name="ChercherNom" class="validate">
					<label for="ChercherNom">Nom du médecin</label>
				</div>
				<div class="col s2"> <!-- Utilisation de la classe de grille pour occuper 2 colonnes sur 12 -->
					<button class="btn waves-effect waves-light" type="submit">Rechercher</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>