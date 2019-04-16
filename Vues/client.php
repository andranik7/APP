<!DOCTYPE html>
<html>
<head>
	<title>Profile Utilisateur</title>
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
					<tr>
						<td> <button class="btn-tab" onclick="listePiece()">
							Habitat 1
						</button></td>
					</tr>
					<tr>
						<td><button class="btn-tab" onclick="listePiece()">
							Habitat 2
						</button></td>
					</tr>
					<tr>
						<td> <button class="btn-tab" onclick="listePiece()">
							Habitat 3
						</button> </td>
					</tr>
				</table>

				<button class="btn-ajouter" onclick="ajouterHabitat()" style="height: auto;">
					Ajouter un habitat
				</button>



				<div id="newHabitat" style="display:none">
					<div class="content">
						<div style="flex: 1;">
							Adresse
						</div>
						<div style="flex: 2">
							<input type="text" required name="adresse" class="input_content" placeholder="9 avenue Victor Hugo" style="border-radius:5px;">
						</div>
					</div>
					<div class="content">
						<div style="flex: 1;">
							Superficie (m2)
						</div>
						<div style="flex: 2">
							<input type="number" required name="superficie" class="input_content" placeholder="105" style="border-radius:5px;">
						</div>
					</div>
				</div>

			</div>
			
			<div style="flex:1">

				<div id="listePiece" style="display:none">
					

					<table class="tableGestion">
						<tr>
							<th>Liste des pieces</th>
						</tr>
						<tr>
							<td> <button class="btn-tab" onclick="listePiece()">
								Piece 1
							</button></td>
						</tr>
						<tr>
							<td><button class="btn-tab" onclick="listePiece()">
								Piece 2
							</button></td>
						</tr>
						<tr>
							<td><button class="btn-tab" onclick="listePiece()">
								Piece 3
							</button> </td>
						</tr>
					</table>


					<button class="btn-ajouter" onclick="ajouterPiece()">
						Ajouter une piece
					</button>


					<div id="newCapteur" style="display:none">
						<div class="content">
							<div style="flex: 1;">
								Type de piece
							</div>
							<div style="flex: 2">
								<input type="text" required name="typePiece" class="input_content" placeholder="Sallon" style="border-radius:5px;">
							</div>
						</div>
						<div class="content">
							<div style="flex: 1;">
								Superficie (m2)
							</div>
							<div style="flex: 2">
								<input type="number" required name="superficie" class="input_content" placeholder="20" style="border-radius:5px;">
							</div>
						</div>
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