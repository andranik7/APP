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

var links=document.querySelectorAll('a');

// Requete recherche admin
$('#sb').on('input',function(e){
    console.log('input changed');
    e.preventDefault();
    httpRequest.open('POST','./Modeles/requeteUser.php',true);
    var form=document.getElementById('form');
    var data=new FormData(form);
    httpRequest.send(data);
    httpRequest=getHttpRequest();
    httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
        //document.getElementById('result').innerHTML=httpRequest.responseText;
        obj=JSON.parse(httpRequest.responseText);
        removeChild('table-body'); // efface les anciennes données
        for(var i=0;i<obj.length;i++){
            var prenom=obj[i].Prenom;
            var nom=obj[i].Nom;
            var role=obj[i].role;
            var userid=obj[i].idUtilisateur;
            var btnEdit='<img src="Vues/images/edit.png" alt="Editer" data-href="#modal-modif" class="admin_option dlg-edit js-modal">';
            var btnContact='<img src="Vues/images/contact.png" alt="Editer" data-href="#modal-msg" class="admin_option dlg-edit js-modal">';
            var btnDel='<img src="Vues/images/delete.png" alt="Editer" data-href="#modal-del" class="admin_option dlg-edit js-modal">';
            var content='<div class="row" id="rowitem_'+i+'">'+'<div class="cell">'+i+'</div>'+'<div class="cell row_prenom">'+prenom+'</div>'+'<div class="cell row_nom">'+nom+'</div>'+'<div class="cell row_role">'+role+'</div>'+'<div class="cell">'+btnEdit+btnContact+btnDel+'</div>';
            $('#table-body').append(content);
            addListener(); // on ajoute un listener aux boutons juste créés
        }     
    }
}
});


// Requete modal capteur client
$('.addCapteur').on('click',function(e){
    console.log('addCapteur');
    e.preventDefault();
    httpRequest.open('POST','./Controleurs/capteur.php',true);
    var form=document.getElementById('form');
    var data=new FormData(form);
    httpRequest.send(data);
})


function updateListTech(){
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
          var btnView='<form action="" method="post"><input type="hidden" name="prenom" value="'+prenom+'""><input type="hidden" name="nom" value="'+nom+'""><input class="admin_option dlg-edit js-modal" type="image" src="Vues/images/eye.png" alt="Submit Form" /></form>';
          var content='<div class="row" id="rowitem_'+i+'">'+'<div class="cell">'+i+'</div>'+'<div class="cell row_prenom">'+prenom+'</div>'+'<div class="cell row_nom">'+nom+'</div>'+'<div class="cell row_role">'+role+'</div>'+'<div class="cell">'+btnView+'</div>';
          $('#table-body').append(content);
          //addListener(); // on ajoute un listener aux boutons juste créés
      }
    }
  }
}
$('#sb-tech').on('input',function(e){
  console.log('sb tech');
  e.preventDefault();
  updateListTech();
})

// Affiche la liste des utilisateurs au chargement de la page technicien
$(window).on('load',function(e){
  updateListTech(); 
  
});


function addListener(){
  document.querySelectorAll('.js-modal').forEach(img=>{
      img.addEventListener('click',openModal);
  })
}

function removeChild(parent){
    var myNode = document.getElementById(parent);
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}
