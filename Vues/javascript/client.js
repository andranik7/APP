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

function openModal(e){
	document.getElementById('wrapper').style.display="block";
}

function closeModal(e){
	document.getElementById('wrapper').style.display="none";
}
const stopPropagation=function(e){
    // empêche la propagation du click aux parents > empeche de fermer quand on clique dans la fenetre
    e.stopPropagation(); //
}

$('#modal-close').click(function(e) {
	closeModal(e);
});

$('.btn-piece').click(function(e) {
	openModal(e);
});



window.addEventListener('keydown',function(e){
    if(e.key == "Escape" || e.key=="Esc"){
        closeModal(e);
    }
})


