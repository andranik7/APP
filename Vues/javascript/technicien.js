var getHttpRequest= function(){
  // permet de supporter tous les navigateurs ( même les moins bons tels que IE .......)
  var httpRequest = false;
  if (window.XMLHttpRequest) { // Mozilla, Safari,...
      httpRequest = new XMLHttpRequest();
      if (httpRequest.overrideMimeType) {   // permet d'éviter un bug
        httpRequest.overrideMimeType('text/xml');
      }
  }
  else if (window.ActiveXObject) { // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }
  
  if (!httpRequest) {
    alert('Abandon :( Impossible de créer une instance XMLHTTP');
    return false;
  }

  return httpRequest;
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

$('#modal-close').click(function(e) {
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

// Affichage

var tabcontent=document.getElementsByClassName('tabcontent');
for (var i = 0; i < 3 ; i++) {
  try{
    tabcontent[i].style.display="none";
  }catch(e){
    console.log(e);
  }
}

function dispTabTech(tabname){

  var tabcontent=document.getElementsByClassName('tabcontent');   
  var tabtitle=document.getElementsByClassName('tabbutton');
  for (var i = 0; i < 3 ; i++) {
    tabcontent[i].style.display="none";
    tabtitle[i].style.backgroundColor='#556fb2';
  }

  document.getElementById(tabname).style.display="block";
  document.getElementById(tabname+"btn").style.backgroundColor='#eba338';
}

$('.row').click(function() {
  var itemNumer= this.id.replace('rowitem_','');
  var cell=$(this).children('.cell');
  var usertId=cell[0].textContent;
  var userFirstName=cell[1].textContent;
  var userLastName=cell[2].textContent;
  //document.cookie='userId='+item;
});

function addListener(){
  document.querySelectorAll('.js-modal').forEach(img=>{
  })
}

function load(){
var tabs = ['clients','conso','capt'];

var url_string = window.location.href;
var url = new URL(url_string);
var onglet = url.searchParams.get("onglet");
if(onglet==null){onglet=1;}
console.log("url : "+onglet);

try{
  afficheClients();
}catch(e){
  console.log(e);
}
try{
  dispTabTech(tabs[onglet-1]);
 }catch(e){
  console.log(e);
}
} 

function afficheClients(){
//document.getElementById('result').innerHTML=httpRequest.responseText;
obj=JSON.parse(httpRequest.responseText);
removeChild('table-body'); // efface les anciennes données
for(var i=0;i<obj.length;i++){
    var prenom=obj[i].Prenom;
    var nom=obj[i].Nom;
    var role=obj[i].role;
    var btnView='<form action="" method="post"><input type="hidden" name="prenom" value="'+prenom+'""><input type="hidden" name="nom" value="'+nom+'""><input class="admin_option dlg-edit js-modal" type="image" src="Vues/images/eye.png" alt="Submit Form" /></form>';
    var content='<div class="row" id="rowitem_'+i+'">'+'<div class="cell">'+i+'</div>'+'<div class="cell row_prenom">'+prenom+'</div>'+'<div class="cell row_nom">'+nom+'</div>'+'<div class="cell row_role">'+role+'</div>'+'<div class="cell">'+btnView+'</div>';
    $('#table-body').append(content);
    addListener(); // on ajoute un listener aux boutons juste créés
}
}

function updateModalModif(){
var httpRequest=getHttpRequest();
httpRequest.open('POST','./Modeles/requeteUser.php',true);
var form=document.getElementById('form');
var data=new FormData(form);
httpRequest.send(data);
httpRequest.onreadystatechange=function(){
  if(httpRequest.readyState===4){
    obj=JSON.parse(httpRequest.responseText);
    removeChild('table-body'); // efface les anciennes données
    for(var i=0;i<obj.length;i++){
        var prenom=obj[i].Prenom;
        var nom=obj[i].Nom;
        var role=obj[i].role;
        var userid=obj[i].idUtilisateur;
        var btnView='<form action="" method="post"><input type="hidden" name="prenom" value="'+prenom+'""><input type="hidden" name="nom" value="'+nom+'""><input class="admin_option dlg-edit js-modal" type="image" src="Vues/images/eye.png" alt="Submit Form" /></form>';
        var content='<div class="row" id="rowitem_'+i+'">'+'<div class="cell">'+i+'</div>'+'<div class="cell row_prenom">'+prenom+'</div>'+'<div class="cell row_nom">'+nom+'</div>'+'<div class="cell row_role">'+role+'</div>'+'<div class="cell">'+btnView+'</div>';
        $('#table-body').append(content);
        //addListener(); // on ajoute un listener aux boutons juste créés
    }
  }
}
}

function removeChild(parent){
  var myNode = document.getElementById(parent);
  while (myNode.firstChild) {
      myNode.removeChild(myNode.firstChild);
  }
}