// on initialise l'étape
let step = 1;
changeStep(1); // pour se mettre à l'étape 1 dès le départ

// fonction pour changer l'étape
function changeStep(s){
	step = s; 
	// on commence par change le background du btn séléctionné
	for(let i=1; i<=3; i++){
		if(i==s){
			document.getElementById(i).classList.add("selected");
			document.getElementById("step"+i).style.display = "block"

		}else{
			// on enlève la class selected des autres boutons
			document.getElementById(i).classList.remove("selected");
			document.getElementById("step"+i).style.display = "none"
		}
	}
}


function confirmRegister(){
	// let email = document.getElementById("emailSignup");
	// let email_confirm = document.getElementById("emailConfirmSignup");
	// let password = document.getElementById("passwordSignup");

	// if(email.length>0 && email_confirm.length>0 && password.length>0){

	// }else{
	// 	alert("Remplissez tous les champs.")
	// }

}