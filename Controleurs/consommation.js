var drawPieChart = function(data, colors) {
	var canvas = document.getElementById('canvas');
	var ctx = canvas.getContext('2d');
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	var totalValue=0; for(var i=0; i<data.length; i++) totalValue+=data[i].value;
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
		var perc= calculatePercent(data[i].value,totalValue);
		console.log(totalValue);
	  ctx.fillText(data[i].label+" "+perc+"%"+" "+data[i].value+"W", canvas.width - 200 + 20, y - i * 30 + 10);
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
  
  
  

function loadConsommation(logementID){
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Modeles/requeteConsommation.php',true);
  var data=new FormData();
  data.append('idLogement',logementID);
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
			console.log(httpRequest.responseText);
			obj=JSON.parse(httpRequest.responseText);
			data=[{label:'Lumiere',value:0},{label:'Chauffage',value:0},{label:'Ventilateur',value:0},];
			for (let i = 0; i < obj.length; i++) {
				switch(obj[i].typeCapteur){
					case 'Lumiere':
						data[0].value+=parseInt(obj[i].valeur);
						break;
					case 'Chauffage':
						data[1].value+=parseInt(obj[i].valeur);
						break;
					case 'Ventilateur':
						data[2].value+=parseInt(obj[i].valeur);
						break;
				}
			}
			console.log(data);
			var colors = [ '#f86920', '#30d99c', '#32ace1', '#e9e0d7' ];
			drawPieChart(data, colors);
    }
  }
}

$(window).on('load',function(e){
	//updateListTech();
	//if($('#bodyclient').length>0) loadConsommation();
});