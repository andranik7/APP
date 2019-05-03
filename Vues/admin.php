<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Controle administrateur</title>
        <link rel="stylesheet" type="text/css" href="Vues/css/master-1.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand|PT+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>
    	<div class="tab">
    		<p id="tabtitle">Panneau d'administration</p>
    		<div>
    			<button class="tabbutton" id="newcomptebtn" onclick="dispTab(event,'newcompte')">Créer un nouveau compte</button>
    			<button class="tabbutton" id="consobtn" onclick="dispTab(event,'conso')">Relevé de consommation</button>
    			<button class="tabbutton" id="clientsbtn" onclick="dispTab(event,'clients')">Liste des clients</button>
    		</div>
    		<div>
    			<button class="tabbutton" id="cgubtn" onclick="dispTab(event,'cgu')">Editions des CGU</button>
    			<button class="tabbutton" id="consignesbtn" onclick="dispTab(event,'consignes')">Consignes générales</button>
    			<button class="tabbutton" id="visubtn" onclick="dispTab(event,'visu')">Visualisation globale</button>
    		</div>
    	</div>
    	<div class="tabcontent" id="newcompte">
    		<p class="subtabtitle"> Création d'un nouveau compte </p>
    		<form  method="post" action="">
    			<div id="admin_create">
    				<div class="column">
    					<input type="text" placeholder="Adresse mail">
	    				<input type="password" placeholder="Mot de passe">
	    				<input type="password" placeholder="Confirmer mdp">
	    				<SELECT name="langue" size="1" >
							<option value="a venir">Utilisateur</option>
							<option value="a venir">Gestionnaire</option>
							<option value="a venir">Technicien</option>
							<option value="a venir">Administrateur</option>
						</SELECT>
    				</div>
    				<div class="column">
	    				<input type="text" placeholder="Nom">
	    				<input type="text" placeholder="Prenom">
						<input type="date" id="start" name="trip-start" value="2018-07-22" min="1950-01-01" max="2018-12-31">
						<SELECT name="langue" size="1" >
							<option value="a venir">Homme</option>
							<option value="a venir">Femme</option>
							<option value="a venir">Autre</option>
						</SELECT>
	    			</div>
    			</div>
				<input type="submit" value="Créer le compte" class="submit">
			</form>
			
    	</div>
    	<div class="tabcontent" id="conso">
    		<p class="subtabtitle"> Relevé de consommation</p>
    	</div>
        <div class="tabcontent" id="clients">
    		<p class="subtabtitle"> Liste des clients</p>
    		<div>
    			<div id="search">
					<form action="" id="form">
						<input type="text" name="recherche" id="sb" placeholder="Rechercher..." autocomplete=off>
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
    					<?php
/* 	    					for($i=0;$i<sizeof($donnees);$i++){
	    						$prenom=$donnees[$i]['Prenom'];
	    						$nom=$donnees[$i]['Nom'];
	    						$role=$donnees[$i]['role'];
								$btnEdit='<img src="Vues/images/edit.png" alt="Editer" data-href="#modal-modif" class="admin_option dlg-edit js-modal">';
								$btnContact='<img src="Vues/images/contact.png" alt="Editer" data-href="#modal-msg" class="admin_option dlg-edit js-modal">';
								$btnDel='<img src="Vues/images/delete.png" alt="Editer" data-href="#modal-del" class="admin_option dlg-edit js-modal">';
	    						echo '<div class="row" id="rowitem_'.$i.'">';
	    						echo '<div class="cell">'.$i.'</div>'.'<div class="cell row_prenom">'.$prenom.'</div>'.'<div class="cell row_nom">'.$nom.'</div>'.'<div class="cell row_role">'.$role.'</div>'.'<div class="cell">'.$btnEdit.$btnContact.$btnDel.'</div>';
	    						echo '</div>';
	    					} */
	    				 ?>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="tabcontent" id="cgu">
    		<p class="subtabtitle"> Editions des CGU</p>
			<div id="editable" contenteditable="true">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit nunc at dui scelerisque, at pharetra ligula pretium. Mauris id odio gravida, dignissim orci quis, tempus arcu. Suspendisse et mauris vitae elit auctor posuere id a justo. Quisque a tellus mollis, ultrices lectus non, suscipit diam. Vestibulum pretium dolor at nulla dapibus, et elementum nisi pharetra. Etiam finibus velit dui, et bibendum lectus porttitor in. Aenean sed nisi sed nisi volutpat ornare vel id urna. Nulla efficitur justo ac pulvinar viverra. Aenean non felis non felis rhoncus faucibus ac a diam. Cras id tellus nec neque vehicula scelerisque. Aliquam mattis libero id ipsum posuere pellentesque. Nullam ornare diam vel ex vehicula, vel consequat dolor convallis. Donec pretium tempor elementum.

				Morbi vel malesuada sapien. Fusce fermentum vulputate lacus vitae bibendum. Nullam vel tellus nisl. Praesent porta posuere tortor, nec posuere ex egestas eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean interdum orci mi, et varius magna tempor ac. Praesent blandit lacus vitae magna posuere rhoncus.

				Aenean lorem ante, lacinia nec fermentum et, tincidunt in sapien. Ut sit amet finibus odio. Ut eget lectus ut nunc euismod semper a vel urna. Morbi fermentum elit nec quam consequat porta. Sed rutrum nulla justo, vitae consequat erat consequat nec. Quisque in pellentesque orci. Sed laoreet tristique mauris, at pulvinar odio molestie vel. Maecenas nec aliquet ipsum, id suscipit elit. Suspendisse tincidunt purus quis varius auctor. Aliquam lobortis iaculis dui ut tristique. Etiam eleifend porta ex id tincidunt.

				Fusce tempus arcu at malesuada mollis. Mauris pulvinar pretium nulla quis lobortis. Pellentesque vel lorem magna. Nulla sodales malesuada faucibus. Nulla feugiat, ligula vitae viverra cursus, libero lacus convallis odio, eu pharetra mauris nunc at lorem. In varius dapibus metus, ac dapibus diam vestibulum eget. Aenean hendrerit eu enim sit amet tempor. In at magna massa. Maecenas lacinia mauris id odio euismod finibus. Donec vel iaculis arcu, in ornare nisi. Maecenas ante neque, dictum non ipsum a, commodo finibus enim. Cras sed cursus tellus, non feugiat velit. Morbi eu sapien mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin at bibendum nulla, id eleifend justo.

				Mauris pharetra sapien rhoncus, tristique nibh eget, vulputate risus. Fusce porttitor enim in accumsan gravida. Mauris finibus vel metus eget fermentum. Quisque nec viverra neque, convallis maximus nulla. Aliquam augue metus, sagittis quis lorem porttitor, commodo eleifend elit. Nulla ornare malesuada massa vel maximus. Proin volutpat varius augue, sit amet luctus nulla. Phasellus quis metus commodo, iaculis risus sed, molestie justo. Proin et lorem lectus. Quisque sem turpis, elementum non augue id, vulputate aliquet nisi. Cras faucibus auctor pharetra. Donec sagittis leo eu sapien auctor, et vehicula lectus rutrum.
			</div>
			<form action="" action="post">
				<button type="submit" class="submit">Sauvegarder</button>
			</form>
    	</div>
    	<div class="tabcontent" id="consignes">
    		<p class="subtabtitle"> Consignes générales</p>
    	</div>
       	<div class="tabcontent" id="visu">
    		<p class="subtabtitle"> Visualisation globale</p>
		</div>
		

		<div id="modal-modif" class="modal" role="modal" style="display:none;">
    		<div class="modal-wrapper js-modal-stop">
        		<button class="js-modal-close">&#10006</button>
        		<p id="modif-title"> Modifications utilisateur n°[UID]</p>
				<div>
					<form action="" id="form-modif-client">
						<table>
							<tr>
								<td>Nom</td>
								<td><input type="text" id="fname-txt"></td>
							</tr>
							<tr>
								<td>Prenom</td>
								<td><input type="text" id="lname-txt"></td>
							</tr>
							<tr>
								<td>Mail</td>
								<td><input type="text" id="mail-txt"></td>
							</tr>
						</table>
						<input type="submit" value="Modifier">
					</form>
				</div>
			</div>
		</div>

		<div id="modal-msg" class="modal" role="modal" style="display:none;">
    		<div class="modal-wrapper js-modal-stop">
        		<button class="js-modal-close">FERMER</button>
				<div>
					A VENIR
				</div>
			</div>
		</div>
		<div id="modal-del" class="modal" role="modal" style="display:none;">
    		<div class="modal-wrapper js-modal-stop">
				<p> Êtes-vous sur de vouloir supprimer l'utilisateur suivant?</p>
				<p id="delete-name">[USERNAME]</p>
				<div class="center">
					<button class="js-modal-close">ANNULER</button>
					<button class="js-modal-close">CONFIRMER</button>
				</div>
			</div>
		</div>


    </body>




<script src="Vues/javascript/admin.js"></script>

</html>

