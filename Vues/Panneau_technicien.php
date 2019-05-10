<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Recherche de Client</title>
    <link rel="stylesheet" href="Vues/css/Panneau_technicien.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body onload="load(event)" id="bodytech">

	<div class="tab">
    		<p id="tabtitle">Panneau de Technicien</p>
    		<div>
    			<button class="tabbutton" id="clientsbtn" onclick="dispTab(event,'clients')">Liste des clients</button>
    			<button class="tabbutton" id="consobtn" onclick="dispTab(event,'conso')">Relevé de consommation</button>
    			<button class="tabbutton" id="captbtn" onclick="dispTab(event,'capt')">Modification des Capteurs/Actionneurs</button>
    		</div>
    	</div>

    <div class="tabcontent" id="clients">
		<p class="subtabtitle"> Liste des clients</p>
		<div>
			<div id="search">
				<form action="" id="form">
					<input type="text" name="recherche" id="sb-tech" placeholder="Rechercher..." autocomplete=off>
					<SELECT name="langue" size="1" >
							<option value="a venir">Tous</option>
							<option value="a venir">Utilisateurs</option>
							<option value="a venir">Gestionnaires</option>
							<option value="a venir">Techniciens</option>
							<option value="a venir">Administrateurs</option>
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
    </div>

    <div class="tabcontent" id="capt">
    	<p class="subtabtitle"> capteurs</p>

    </div>

</body>

<script src="Vues/javascript/technicien.js"></script>

</html>