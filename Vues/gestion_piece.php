<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="Vues/css/gestion_piece.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body id="bodyclient">
	<div id="wrapper" style="display:none;" class="modal">
		<div id="modal-content">
			<div class="entete">
				<?php echo '<h1 style="color:#fff">'. $_SESSION['piece'].'</h1>'?>
				<button id="modal-close">&#10006</button>

			</div>
			<div id="tabmodal">
				<button class="tabbutton" id="ajoutobjetstab" onclick="dispTab('ajoutobjets')">Ajouter / Supprimer des objets</button>
				<button class="tabbutton" id="ordresobjetstab" onclick="dispTab('ordresobjets')">Contrôler mes objets connectés</button>
			</div>
			<div id="ordresobjets">
				<div class="title">
					Contrôler mes objets connectés
				</div>
				<div id="help">
					<div> Ici vous pouvez donner des ordres à vos capteurs et actionneurs</div>
				</div>
				
				<div id="ordres">
					<div id="selectOrder">
						<div class="orderwrapper">
							<div class="order">Gestion de la lumière</div>
							<div class="ordercontent" style="display:none" id="contentlumiere">
							</div>
						</div>
						<div class="orderwrapper">
							<div class="order">Gestion du chauffage</div>
							<div class="ordercontent" style="display:none" id="contentchauffage">AEAZEAE</div>
						</div>
						<div class="orderwrapper">
							<div class="order">Contrôle des ventilateurs</div>
							<div class="ordercontent" style="display:none" id="contentventilateur">AEAZEAE</div>
						</div>
						<div class="orderwrapper">
							<div class="order">Contrôle des portes</div>
							<div class="ordercontent" style="display:none" id="contentporte">AEAZEAE</div>
						</div>
						<div class="orderwrapper">
							<div class="order">Contrôle des volets</div>
							<div class="ordercontent" style="display:none" id="contentvolet">AEAZEAE</div>
						</div>
					</div>
				</div>
			</div>
			<div id="ajoutobjets">	
				<div class="title">
					Ajout/Retrait de capteurs et d'actionneurs
				</div>
				<div class="boiteprincipale">
					<div class="boitegauche">
						<div id="leftcontainer">			
							<div class="btn-ajouter">Capteurs</div>
							<div id="capteurs">
								<div  class="ligne">
									<div class="boite">
										<img src="Vues/images/temperature.jpg">
										<div class="ajsupr">
											<div class="description-capteur"> Capteur de température</div>
											<form action="" method="post">
												<input  type="button" class="addCapteur" value="Ajouter" name="Capteur de température">
											</form>
										</div>
									</div>
									<div class="boite">
										<img src="Vues/images/distance.jpg">
										<div class="ajsupr">
										<div class="description-capteur"> Capteur de distance</div>
											<form action="" method="post">
												<input type="submit" class="addCapteur" value="Ajouter" name="Capteur de distance">
											</form>
										</div>
									</div>					
									<div class="boite">
										<img src="Vues/images/lumiere.jpg">
										<div class="ajsupr">
											<div class="description-capteur"> Capteur de luminosité</div>
											<form action="" method="post">
												<input type="submit" class="addCapteur" value="Ajouter" name="Capteur de luminosité">
											</form>
										</div>
									</div>
								</div>
								<div  class="ligne">	
									<div class="boite">
										<img src="Vues/images/son.jpg">
										<div class="ajsupr">
											<div class="description-capteur"> Capteur sonore</div>
											<form action="" method="post">
												<input type="submit" class="addCapteur" value="Ajouter" name="Capteur sonore">
											</form>
										</div>
									</div>
									<div class="boite">
										<img src="Vues/images/camera.jpg">
										<div class="ajsupr">
											<div class="description-capteur"> Caméra</div>
											<form action="" method="post">
												<input type="submit" class="addCapteur" value="Ajouter" name="Caméra">
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-ajouter">Actionneurs</div>
							<div id="actionneurs">
								<div  class="ligne">
										<div class="boite">
											<img src="Vues/images/blinds.png">
											<div class="ajsupr">
												<div class="description-capteur"> Moteur volets</div>
												<form action="" method="post">
													<input type="submit" class="addCapteur" value="Ajouter" name="Moteur volets">
												</form>
											</div>
										</div>
										<div class="boite">
											<img src="Vues/images/door.png">
											<div class="ajsupr">
												<div class="description-capteur"> Moteur porte</div>
												<form action="" method="post">
													<input type="submit" class="addCapteur" value="Ajouter" name="Moteur porte">
												</form>
											</div>
										</div>
										<div class="boite">
											<img src="Vues/images/fan.png">
											<div class="ajsupr">
												<div class="description-capteur"> Ventilateur</div>
												<form action="" method="post">
													<input type="submit" class="addCapteur" value="Ajouter" name="Ventilateur">
												</form>
											</div>
										</div>
								</div>
								<div  class="ligne">
										<div class="boite">
											<img src="Vues/images/lumiere.jpg">
											<div class="ajsupr">
												<div class="description-capteur"> Lumière</div>
												<form action="" method="post">
													<input type="submit" class="addCapteur" value="Ajouter" name="Lumiere">
												</form>
											</div>
										</div>
										<div class="boite">
											<img src="Vues/images/heater.png">
											<div class="ajsupr">
												<div class="description-capteur"> Chauffage</div>
												<form action="" method="post">
													<input type="submit" class="addCapteur" value="Ajouter" name="Chauffage">
												</form>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
						
					<div id="boitedroite">
						<div id="nocapteur"></div>
						<fieldset  class="subcapteur">
							<legend>Température</legend>
							<div id="catTemperature" class="scrollSubCapteur"><p>Pas encore de capteurs</p></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Distance</legend>
							<div id="catDistance" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Luminosité</legend>
							<div id="catLuminosite" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Sonore</legend>
							<div id="catSonore" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Caméra</legend>
							<div id="catCamera" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Moteur volet</legend>
							<div id="catMoteurVolet" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Moteur porte</legend>
							<div id="catMoteurPorte" class="scrollSubCapteur"></div>
						</fieldset>		
						<fieldset  class="subcapteur">
							<legend>Ventilateur</legend>
							<div id="catVentilateur" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Lumière</legend>
							<div id="catLumiere" class="scrollSubCapteur"></div>
						</fieldset>
						<fieldset  class="subcapteur">
							<legend>Chauffage</legend>
							<div id="catChauffage" class="scrollSubCapteur"></div>
						</fieldset>

						<?php
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script src="Vues/javascript/gestion_piece.js"></script>