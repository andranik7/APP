<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="Vues/css/style.css">
</head>
<body>
	<div style="text-align: center">
		<div class="rectangle center">
			<h2 class="title">Inscription</h2>
			
			<div>
				<div class="steps">
					<button class="btn-step" id="1" onclick="changeStep(1)">1</button>
					<button class="btn-step" id="2" onclick="changeStep(2)">2</button>
					<button class="btn-step" id="3" onclick="changeStep(3)">3</button>
				</div>
				<form action="" method="POST">
					<div id="step1">
						
						<input type="text" id="emailSignup" required  name="email" class="input_connexion" placeholder="Email" style="border-top-left-radius:5px; border-top-right-radius:5px;">
						<input type="text" id="emailConfirmSignup" required name="email_confirm" class="input_connexion" placeholder="Confirmer email" ">
						<input type="password" id="passwordSignup" required name="password" class="input_connexion" placeholder="Mot de passe" style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;">

						<button type="button" class="btn-connect" onclick="changeStep(2)">Valider</button>

					</div>
					<div id="step2" style="display:none;">

						<select id="civilite" class="select_civilite" name="civilite">
							<option selected value="madame">Madame</option>
							<option value="monsieur">Monsieur</option>
						</select>

						<input type="text" id="dateSignup" required  name="date" class="input_connexion" placeholder="Date de naissance (JJ-MM-YYYY)" style="border-top-left-radius:5px; border-top-right-radius:5px;">
						<input type="text" id="nomSignup" required  name="nom" class="input_connexion" placeholder="Nom">
						<input type="text" id="prenomSignup" required name="prenom" class="input_connexion" placeholder="Prénom">
						<input type="text" id="adresseSignup" required name="adresse" class="input_connexion" placeholder="Adresse postale">

						<input type="text" id="cpSignup" required name="cp" class="input_connexion" placeholder="Code postale" style="border-bottom-left-radius:5px;border-bottom-right-radius:5px;">

						<button type="button" class="btn-connect" onclick="changeStep(3)">Valider</button>

					</div>
					<div id="step3" style="display:none;">

						<div class="cgu">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>

						<button type="submit" class="btn-connect" id="submit">
							Soumettre
						</button>

					</div>
					<section class="message" id="message" style="display: none"></section>
				</form>
				<div id="deja">Vous avez déjà un compte? <a href="/app/index.php?cible=utilisateurs&function=connexion" id="redirect">Connectez-vous</a></div>
				<div><a href="/app/index.php" id="retour_accueil">Retour Accueil</a></div>
			</div>
			
		</div>
	</div>
	<script type="text/javascript" src="Vues/javascript/inscription.js"></script>
</body>
</html>
