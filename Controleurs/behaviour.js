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


function updateUserList(currentRole){

  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Modeles/requeteUser.php',true);
  var form=document.getElementById('form');
  var data=new FormData(form);
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
      console.log(httpRequest.responseText);
      obj=JSON.parse(httpRequest.responseText);
      removeChild('table-body'); // efface les anciennes données
      if(obj.length==0) $('#table-body').append("Aucunes données trouvées");
      for(var i=0;i<obj.length;i++){
          
          var prenom=obj[i].Prenom;
          
          var nom=obj[i].Nom;
          var role=obj[i].role;
          var userid=obj[i].idUtilisateur;
          var content;
          if(currentRole=="tech"){
            var btnView='<form action="" method="post"><input type="hidden" name="prenom" value="'+prenom+'""><input type="hidden" name="nom" value="'+nom+'""><input class="admin_option dlg-edit js-modal" type="image" src="Vues/images/eye.png" alt="Submit Form" /></form>';
            content='<div class="row" id="rowitem_'+i+'">'+'<div class="cell">'+i+'</div>'+'<div class="cell row_prenom">'+prenom+'</div>'+'<div class="cell row_nom">'+nom+'</div>'+'<div class="cell row_role">'+role+'</div>'+'<div class="cell">'+btnView+'</div>';
          }else if(currentRole=="admin"){
            var btnEdit='<img src="Vues/images/edit.png" alt="Editer" data-href="#modal-modif" class="admin_option dlg-edit js-modal">';
            var btnContact='<img src="Vues/images/contact.png" alt="Editer" data-href="#modal-msg" class="admin_option dlg-edit js-modal">';
            var btnDel='<img src="Vues/images/delete.png" alt="Editer" data-href="#modal-del" class="admin_option dlg-edit js-modal">';
            content='<div class="row user'+userid+'" id="user_'+userid+'">'+'<div class="cell">'+i+'</div>'+'<div class="cell row_prenom">'+prenom+'</div>'+'<div class="cell row_nom">'+nom+'</div>'+'<div class="cell row_role">'+role+'</div>'+'<div class="cell">'+btnEdit+btnContact+btnDel+'</div>';
          }
          $('#table-body').append(content);
          addListener(); // on ajoute un listener aux boutons juste créés
      }
    }
  }
}

function updateModalModif(idUser){
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Modeles/requeteSpecificUser.php',true);
  var form=document.getElementById('form');
  var data=new FormData();
  data.append('userid',idUser);
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
      console.log(httpRequest.responseText);
      obj=JSON.parse(httpRequest.responseText);
      removeChild('form-modif-client'); // efface les anciennes données
      $('#modif-title').text('Modification de l\'utilisateur n°'+obj[0].idUtilisateur)
      var content='<table><tr><td>Nom</td><td><input type="text" value="'+obj[0].nom+'" name="nom"></td></tr><tr><td>Prénom</td><td><input type="text" value="'+obj[0].prenom+'" name="prenom"></td></tr><tr><td>E-mail</td><td><input type="text" value="'+obj[0].email+'" name="mail"></td></tr><tr><td><input type="submit" value="Envoyer" id="submitmodifuser"></td></tr></table>';
      $('#form-modif-client').append(content);
      
    }
  }
}
function displayListeCapteur(){
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Modeles/requeteListeCapteur.php',true);
  var data=new FormData();
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
      removeChild('boitedroite'); // efface les anciennes données
      obj=JSON.parse(httpRequest.responseText);
      if(obj.length==0) $('#boitedroite').append('<div class="capteur">Vous n\'avez pas encore de capteurs dans cette pièce. Vous pouvez en ajouter avec le menu sur votre gauche.</div>');
      else{
        for(var i=0;i<obj.length;i++){
          $('#boitedroite').append('<div class="capteur"><div class="nomCapteur">'+obj[i].type +' id: '+obj[i].idCapteur+' valeur: '+obj[i].valeur+'</div> <button class="supprimerCapteur">&#10006</button> </div> <div class="separateur"></div>');
        }
      }
    }
  }
  
}
// Event handler
// Requete recherche tech
$('#sb-tech').on('input',function(e){
  console.log('sb tech');
  e.preventDefault();
  updateUserList('tech');
})
// Requete recherche admin
$('#sb').on('input',function(e){
  console.log('input changed');
  e.preventDefault();
  updateUserList('admin');
});


$('#userrole').change(function(e){
  updateUserList('admin');
});

$('.btn-logement').on('click',function(e){
  displayListeCapteur();
});

$('#form-modif-client').on('submit',function(e){
  e.preventDefault();
  console.log('submit');
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Modeles/requeteUpdateUser.php',true);
  var form=document.getElementById('form-modif-client');
  var idUser=$('#modif-title').text().replace("Modification de l'utilisateur n°","");
  var data=new FormData(form);
  data.append('userid',idUser);
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
      if(httpRequest.responseText=="succes") $('#modifnotif').text("Modifications effectuées");
      //obj=JSON.parse(httpRequest.responseText);
      updateUserList('admin');
      updateModalModif(idUser);
    }
  }
});

 // Requete modal capteur client
$('.addCapteur').on('click',function(e){
  var httpRequest=getHttpRequest();
  console.log('addCapteur');
  e.preventDefault();
  httpRequest.open('POST','./Modeles/requeteAjoutCapteurs.php',true);
  var data=new FormData();
  data.append('typecapteur',e.target.name);
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
      console.log("RECEIVED: "+httpRequest.responseText);
      displayListeCapteur();
    }
  }
});

$('.supprimerCapteur').on('click',function(e){
  console.log("ok");
});

// Affiche la liste des utilisateurs au chargement de la page technicien
$(window).on('load',function(e){
  //updateListTech();
  if($('#bodytech').length>0) updateUserList('tech');
  if($('#bodyadmin').length>0) updateUserList('admin');
  //console.log($('#body'));
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

