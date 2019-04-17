<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="Vues/css/gestion_piece.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
	<div id="wrapper" style="display:none;" class="modal">
		<div id="modal-content">
			<div class="entete">
				<h1>Ajout/Retrait de capteurs dans la pièce</h1>
				<button id="modal-close">&#10006</button>
			</div>
			<div class="boiteprincipale">
				<div class="boitegauche">
					<div  class="ligne">
						<div class="boite">
							<img src="Vues/images/temperature.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur de température</div>
								<button class="bouton">Ajouter</button>
							</div>
						</div>
						<div class="boite">
							<img src="Vues/images/distance.jpg">
							<div class="ajsupr">
							<div class="description-capteur"> Capteur de distance</div>
								<button class="bouton">Ajouter</button>
							</div>
						</div>
					</div>
					<div  class="ligne">
						<div class="boite">
							<img src="Vues/images/lumiere.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur de luminosité</div>
								<button class="bouton">Ajouter</button>
							</div>
						</div>	
						<div class="boite">
							<img src="Vues/images/son.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur sonore</div>
								<button class="bouton">Ajouter</button>
							</div>
						</div>
					</div>
					<div  class="ligne">
						<div class="boite">
							<img src="Vues/images/moteur.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur de température</div>
								<button class="bouton">Ajouter</button>
							</div>
						</div>
						<div class="boite">
							<img src="Vues/images/camera.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Caméra</div>
								<button class="bouton">Ajouter</button>
							</div>
						</div>
					</div>
				</div>
				<div class="boitedroite">
					<?php 
						$nbCapteurs = 15;
						for ($i=0; $i < $nbCapteurs; $i++) { 
							echo '<div class="capteur">  <div class="nomCapteur"> Capteur de température </div> <button class="supprimerCapteur">&#10006</button> </div> <div class="separateur"></div>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>