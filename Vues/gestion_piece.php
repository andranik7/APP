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
				<?php echo '<h1>Ajout/Retrait de capteurs dans : '. $_SESSION['piece'].'</h1>'?>
				<button id="modal-close">&#10006</button>
			</div>
			<div class="boiteprincipale">
				<div class="boitegauche">
					<div  class="ligne">
						<div class="boite">
							<img src="Vues/images/temperature.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur de température</div>
								<form action="" method="post">
									<input  type="button" class="addCapteur" value="Ajouter" name="c_temperature">
								</form>
								
							</div>
						</div>
						<div class="boite">
							<img src="Vues/images/distance.jpg">
							<div class="ajsupr">
							<div class="description-capteur"> Capteur de distance</div>
								<form action="" method="post">
									<input type="submit" class="addCapteur" value="Ajouter" name="c_distance">
								</form>
							</div>
						</div>
					</div>
					<div  class="ligne">
						<div class="boite">
							<img src="Vues/images/lumiere.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur de luminosité</div>
								<form action="" method="post">
									<input type="submit" class="addCapteur" value="Ajouter" name="c_luminosite">
								</form>
							</div>
						</div>	
						<div class="boite">
							<img src="Vues/images/son.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Capteur sonore</div>
								<form action="" method="post">
									<input type="submit" class="addCapteur" value="Ajouter" name="c_sonore">
								</form>
							</div>
						</div>
					</div>
					<div  class="ligne">
						<div class="boite">
							<img src="Vues/images/moteur.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Moteur</div>
								<form action="" method="post">
									<input type="submit" class="addCapteur" value="Ajouter" name="c_moteur">
								</form>
							</div>
						</div>
						<div class="boite">
							<img src="Vues/images/camera.jpg">
							<div class="ajsupr">
								<div class="description-capteur"> Caméra</div>
								<form action="" method="post">
									<input type="submit" class="addCapteur" value="Ajouter" name="c_camera">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div id="boitedroite">
					<?php
						if(isset($listeCapteur)){
							if(sizeOf($listeCapteur)==0)
								echo '<div class="capteur">Vous n\'avez pas encore de capteurs dans cette pièce. Vous pouvez en ajouter avec le menu sur votre gauche.</div>';
							else{
								for ($i=0; $i < sizeOf($listeCapteur); $i++) { 
									echo '<div class="capteur">  <div class="nomCapteur">'.$listeCapteur[$i]['type'] .' id: '.$listeCapteur[$i]['idCapteur'].' valeur: '.$listeCapteur[$i]['valeur'].'</div> <button class="supprimerCapteur">&#10006</button> </div> <div class="separateur"></div>';
								}
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>