let step = 1;
changeStep(1); // pour se mettre à l'étape 1 dès le départ

// fonction pour changer l'étape
function changeStep(s){
	step = s; 

	// on commence par change le background du btn séléctionné
	for(let i=1; i<=3; i++){
		if(i==s){
			document.getElementById(i).classList.add("btn-menu-selected");
			document.getElementById("rectangleContenu"+i).style.display = "block"
		}else{
			// on enlève la class selected des autres boutons
			document.getElementById(i).classList.remove("btn-menu-selected");
			document.getElementById("rectangleContenu"+i).style.display = "none"

		}
	}
}

function ajouterHabitat(){

	document.getElementById("newHabitat").style.display = "block"

}


function ajouterPiece(){

	document.getElementById("newCapteur").style.display = "block"

}

function listePiece(){

	document.getElementById("listePiece").style.display = "block"

}


// gestion du modal

function openModal(){
	document.getElementById('wrapper').style.display="block";
}

function closeModal(){
	document.getElementById('wrapper').style.display="none";
}
const stopPropagation=function(e){
    // empêche la propagation du click aux parents > empeche de fermer quand on clique dans la fenetre
    e.stopPropagation(); //
}

$(document).on('click','#modal-close',function(e) {
	console.log('close');
	closeModal();

});
$('.btn-piece').click(function(e) {
	openModal();
});



window.addEventListener('keydown',function(e){
    if(e.key == "Escape" || e.key=="Esc"){
        closeModal();
    }
})

// graphique


// graphique




function modify(type){
	switch(type){
		case 'nom':
			document.getElementById('subinfosnom').style.display='none';
			document.getElementById('newNom').style.display='block';
			break;

		case 'prenom':
			document.getElementById('subinfosprenom').style.display='none';
			document.getElementById('newPrenom').style.display='block';
			break;

		case 'mail':
			document.getElementById('subinfosmail').style.display='none';
			document.getElementById('newMail').style.display='block';
			break;
	}
}