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




