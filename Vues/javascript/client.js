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


var drawPieChart = function(data, colors) {
	var canvas = document.getElementById('canvas');
	var ctx = canvas.getContext('2d');
	var x = canvas.width / 2;
		y = canvas.height / 2;
	var color,
		startAngle,
		endAngle,
		total = getTotal(data);
  
	for(var i=0; i<data.length; i++) {
	  color = colors[i];
	  startAngle = calculateStart(data, i, total);
	  endAngle = calculateEnd(data, i, total);
  
	  ctx.beginPath();
	  ctx.fillStyle = color;
	  ctx.moveTo(x, y);
	  ctx.arc(x, y, y-100, startAngle, endAngle);
	  ctx.fill();
	  ctx.rect(canvas.width - 200, y - i * 30, 12, 12);
	  ctx.fill();
	  ctx.font = "13px sans-serif";
	  ctx.fillText(data[i].label, canvas.width - 200 + 20, y - i * 30 + 10);
	}
  };
  
  var calculatePercent = function(value, total) {
  
	return (value / total * 100).toFixed(2);
  };
  
  var getTotal = function(data) {
	var sum = 0;
	for(var i=0; i<data.length; i++) {
	  sum += data[i].value;
	}
  
	return sum;
  };
  
  var calculateStart = function(data, index, total) {
	if(index === 0) {
	  return 0;
	}
  
	return calculateEnd(data, index-1, total);
  };
  
  var calculateEndAngle = function(data, index, total) {
	var angle = data[index].value / total * 360;
	var inc = ( index === 0 ) ? 0 : calculateEndAngle(data, index-1, total);
  
	return ( angle + inc );
  };
  
  var calculateEnd = function(data, index, total) {
  
	return degreeToRadians(calculateEndAngle(data, index, total));
  };
  
  var degreeToRadians = function(angle) {
	return angle * Math.PI / 180
  }
  
  var data = [
	{ label: 'Consommation électrique', value: 130 },
	{ label: 'Consommation de chauffage', value: 150 },
	{ label: 'Economies', value: 80 }
  ];
  var colors = [ '#f86920', '#30d99c', '#32ace1', '#e9e0d7' ];
  
  drawPieChart(data, colors);


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