<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Recherche de Client</title>
    <link rel="stylesheet" href="Vues/css/Panneau_technicien.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="Vues/javascript/technicien.js"></script>

</head>
<body onload="load()" id="bodytech">
	<?php
		echo "POST: ";
		print_r($_POST);
		echo "</br>SESSION: ";
		print_r($_SESSION);
	?>
	<div class="tab">
    		<p id="tabtitle">Panneau de Technicien</p>
    		<div>
				<a href="index.php?cible=utilisateurs&amp;function=user&amp;onglet=1"><button class="tabbutton" id="clientsbtn">Liste des clients</button></a>
				<a href="index.php?cible=utilisateurs&amp;function=user&amp;onglet=2"><button class="tabbutton" id="consobtn">Relevé de consommation</button></a>
				<a href="index.php?cible=utilisateurs&amp;function=user&amp;onglet=3"><button class="tabbutton" id="captbtn">Modification des Capteurs/Actionneurs</button></a>
    		</div>
    	</div>

    <div class="tabcontent" id="clients">
		<p class="subtabtitle"> Liste des clients</p>
		<div>
			<div id="search">
				<form action="" id="form">
					<input type="text" name="recherche" id="sb" placeholder="Rechercher..." autocomplete=off>
					<SELECT name="role" size="1" id="userrole">
							<option value="tous">Tous</option>
							<option value="client">Clients</option>
							<option value="gestionnaire">Gestionnaires</option>
							<option value="technicien">Techniciens</option>
							<option value="admin">Administrateurs</option>
					</SELECT>
				</form>
			</div>
			<div id="table">
				<div class="table-header">
					<div class="row">
						  <div class="cell">id</div>
					      <div class="cell">Prénom</div>
					      <div class="cell">Nom</div>
					      <div class="cell">Role</div>
			    	</div> 
				</div>
				<div id="table-body">
				</div>
			</div>
		</div>
	</div>

    <div class="tabcontent" id="conso">
    	<p class="subtabtitle"> Relevé de consommation</p>

    	<?php if(isset($_SESSION["idClient"])){ ?>

    		<div class="rectangleContenu" id="rectangleContenu2">
		<div class="title">
			Mon relevé de consommation
		</div>
		<div style="display:flex; margin-top:100px">
			<div style="flex:10">
				<table class="tableProfile">
					<thead>
						<tr>
							<th>Consommation électrique</th>
							<th>Consommation de chauffage</th>
							<th>Économie</th>
						</tr>
					</thead>
					<tbody>
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
					</tbody>
				</table>
			</div>
			<div style="flex:1">
					<canvas id="canvas" width="800" height="500"></canvas>
			</div>
		</div>
		</div>
    	<?php }else{ ?>
    		<p>Chargez un client avant !</p>
    	<?php } ?>

    </div>

    <div class="tabcontent" id="capt">
    	<p class="subtabtitle"> capteurs</p>

		<?php if(isset($_SESSION["idClient"])){ ?>

    	<div class="block">
			<div style="flex:1;" >
				<table class="tableGestion">
					<tr>
						<th>Liste des habitats</th>
					</tr>
					<form id="formListeHabitats" action="" method="post">
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
					<form id="formHabitat" action="index.php?cible=utilisateurs&amp;function=user&amp;onglet=3" method="post">

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
						<button id="validHab" class="btn-ajouter">Confirmer</button>
					</form>


				</div>

			</div>
			
			<div style="flex:1">

				<div id="listePiece" >
					

					<table class="tableGestion">
						<tr>
							<?php 
							if(isset($_SESSION['adresse']))
								echo '<th>Liste des pieces pour le: '.$_SESSION['adresse'].'</th>';
							else
								echo '<th>Liste des pieces pour le logement </th>';
							?>
						</tr>
						<form action="index.php?cible=utilisateurs&amp;function=user&amp;onglet=3" method="post">
							<?php
							if(isset($listePieces)){
								for($i=0;$i<sizeof($listePieces);$i++){
									echo '<tr><td><input type="submit"  name="piece" class="btn-tab" value="'.$listePieces[$i]['descriptif'].'"></td></tr>';
								}
								if(sizeof($listePieces)==0)
									echo "<tr><td>Vous n'avez pas encore ajouté de pièces. Ajoutez en une avec le bouton ci dessous</tr></td>";
							}else{
								echo "<tr><td>Pour afficher les pièce d'un logement, veuillez en sélectionner un grâce au menu de gauche.</tr></td>";
							}

							?>
						</form>
					</table>


					<button class="btn-ajouter" onclick="ajouterPiece()">
						Ajouter une piece
					</button>


					<div id="newCapteur" style="display:none">
						<form action="index.php?cible=utilisateurs&amp;function=user&amp;onglet=3" method="post">
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
							<button class="btn-ajouter">Confirmer</button>
						</form>
						
					</div>

				</div>

			</div>

		</div>

	<?php }else{ ?>
		<p>Chargez un client avant !</p>
	<?php } ?>

    </div>

</body>

</html>

<?php 
	include('Vues/gestion_piece.php');
	if(isset($displayModal)){
		if($displayModal){
			echo '<script type="text/javascript" >openModal(); </script>';
		}
	}

?>