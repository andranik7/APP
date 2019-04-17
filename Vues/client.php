<!DOCTYPE html>
<html>
<head>
	<title>Profil Utilisateur</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Vues/css/alice.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</head>
<body class="bodyProfile">
	<h2 style="color:#354a6d; font-weight: bold;">Profile</h2>
	<div style="text-align:center">
		<table class="rectangleMenuPanneau">
			<tbody>
				<tr>
					<td>
						<button class="btn-menu" id="1" onclick="changeStep(1)">
							Gestion de l'habitat
						</button>
					</td>
					<td>
						<button class="btn-menu" id="2" onclick="changeStep(2)">
							Relevé de consommation
						</button>
					</td>
					<td>
						<button class="btn-menu" id="3" onclick="changeStep(3)">
							Contrôle des actionneurs
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>


	<div class="rectangleContenu" id="rectangleContenu1">
		<div class="title">
			Gestion de mon habitat
		</div>

		<div class="block">
			<div style="flex:1;" >
				<table class="tableGestion">
					<tr>
						<th>Liste des habitats</th>
					</tr>
					<form action="" method="post">
						<?php
							for($i=0;$i<sizeof($listeLogements);$i++){
								echo '<tr><td><input type="submit" name="logements" class="btn-tab" value="'.$listeLogements[$i]['adresse'].'"></td></tr>';
							}
							if(sizeof($listeLogements)==0)
								echo "<tr><td>Vous n'avez pas encore de logements enregistrés. Ajoutez en un avec le bouton ci dessous</tr></td>";
						?>
					</form>

				</table>

				<button class="btn-ajouter" onclick="ajouterHabitat()" style="height: auto;">
					Ajouter un habitat
				</button>

				<div id="newHabitat" style="display:none">
					<form action="" method="post">
						<div class="content">
							<div style="flex: 1;">
								Adresse
							</div>
							<div style="flex: 2">
								<input type="text" required name="adresse" class="input_content" placeholder="Ex: 9 avenue Victor Hugo" style="border-radius:5px;">
							</div>
						</div>
						<div class="content">
							<div style="flex: 1;">
								Ville
							</div>
							<div style="flex: 2">
								<input type="text" required name="ville" class="input_content" placeholder="Ex: Paris" style="border-radius:5px;">
							</div>
						</div>
						<div class="content">
							<div style="flex: 1;">
								Code postal
							</div>
							<div style="flex: 2">
								<input type="text" required name="cp" class="input_content" placeholder="Ex: 92140" style="border-radius:5px;">
							</div>
						</div>
						<div class="content">
							<div style="flex: 1;">
								Nombre d'habitants
							</div>
							<div style="flex: 2">
								<input type="number" required name="nb_habitants" class="input_content" placeholder="Ex: 4" style="border-radius:5px;">
							</div>
						</div>
						<div class="content">
							<div style="flex: 1;">
								Superficie (m2)
							</div>
							<div style="flex: 2">
								<input type="number" required name="superficie" class="input_content" placeholder="Ex: 105" style="border-radius:5px;">
							</div>
						</div>
						<button type="submit" class="btn-ajouter">Confirmer</button>
					</form>


				</div>

			</div>
			
			<div style="flex:1">

				<div id="listePiece" >
					

					<table class="tableGestion">
						<tr>
							<th>Liste des pieces</th>
						</tr>
						<form >
							<?php
							if(isset($listePieces)){
								for($i=0;$i<sizeof($listePieces);$i++){
									echo '<tr><td><input type="submit"  class="btn-tab" value="'.$listePieces[$i]['descriptif'].'"></td></tr>';
								}
								if(sizeof($listePieces)==0)
									echo "<tr><td>Vous n'avez pas encore ajouté de pièces. Ajoutez en une avec le bouton ci dessous</tr></td>";
							}else{
								echo "<tr><td>Pour afficher les pièce d'un logement, veuillz en sélectionner un grâce au menu de gauche.</tr></td>";
							}

							?>
						</form>
					</table>


					<button class="btn-ajouter" onclick="ajouterPiece()">
						Ajouter une piece
					</button>


					<div id="newCapteur" style="display:none">
						<form action="" method="post">
							<div class="content">
								<div style="flex: 1;">
									Type de piece
								</div>
								<div style="flex: 2">
									<input type="text" required name="typePiece" class="input_content" placeholder="Ex: Sallon, Chambre 1 ..." style="border-radius:5px;">
								</div>
							</div>
							<div class="content">
								<div style="flex: 1;">
									Superficie (m2)
								</div>
								<div style="flex: 2">
									<input type="number" required name="superficie" class="input_content" placeholder="Ex: 20" style="border-radius:5px;">
								</div>
							</div>
							<button type="submit" class="btn-ajouter">Confirmer</button>
						</form>
						
					</div>

				</div>

			</div>

		</div>
	</div>


		<div class="rectangleContenu" id="rectangleContenu2">
			<div class="title">
				Mon relevé de consommation
			</div>
			<table class="tableProfile">
				<tr>
					<th>Consommation électrique</th>
					<th>Consommation de chauffage</th>
					<th>Économie</th>
				</tr>
				<tr>
					<td>100W</td>
					<td>200W</td>
					<td>30W</td>
				</tr>
				<tr>
					<td>100W</td>
					<td>200W</td>
					<td>30W</td>
				</tr>
				<tr>
					<td>100W</td>
					<td>200W</td>
					<td>30W</td>
				</tr>
				<tr>
					<td>100W</td>
					<td>200W</td>
					<td>30W</td>
				</tr>
			</table>
		</div>

		<div class="rectangleContenu" id="rectangleContenu3">
			<div class="title">
				Contrôler mes actionneurs
			</div>
		</div>
		<script type="text/javascript" src="Vues/javascript/client.js"></script>
	</body>
	</html>


<?php include('Vues/gestion_piece.php');?>