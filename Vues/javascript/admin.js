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

$(window).on('load',function(e){
  dispTab('newcompte');
});
var tabcontent=document.getElementsByClassName('tabcontent');
	for (var i = 0; i < 6; i++) {
		tabcontent[i].style.display="none";
	}

	function dispTab(tabname){
        var tabcontent=document.getElementsByClassName('tabcontent');
        
		var tabtitle=document.getElementsByClassName('tabbutton');
		for (var i = 0; i < 6; i++) {
            
			tabcontent[i].style.display="none";
			tabtitle[i].style.backgroundColor='#556fb2';
		}
		document.getElementById(tabname).style.display="block";
		document.getElementById(tabname+"btn").style.backgroundColor='#eba338';
	}

/*

	// 
	$('.dlg-edit').on('click',function(){
		document.getElementById('modal-window').style.display="block";
	});

	$('#closing-btn').on('click',function(){
		document.getElementById('modal-window').style.display="none";
    })
	*/
let modal=null;

const openModal=function(e){
    e.preventDefault(); // empeche le comportement classique du lien
    
    const target=document.querySelector(e.target.getAttribute('data-href')); // récupère la cible du clic
    
    const modalType=e.target.getAttribute('data-href').replace('#',''); // récupère le type de modal à update
    const rowNode=e.target.parentNode.parentNode; // on remonte au parent pour récupérer les infos (nom,prénom etc.)
    var temp=rowNode.id;
    var id=temp.replace('user_','');
    target.style.display=null;
    modal=target;
    modal.addEventListener('click',closeModal);
    modal.querySelector('.js-modal-close').addEventListener('click',closeModal);
    modal.querySelector('.js-modal-stop').addEventListener('click',stopPropagation);

    var cell=rowNode.children;
    var userId=cell[0].textContent;
    var userFirstName=cell[1].textContent;
    var userLastName=cell[2].textContent;

    switch(modalType){
        case 'modal-modif':
            updateModalModif(id);
            break;
        case 'modal-msg':
            updateModalMsg();
            break;
        case 'modal-del':
            updateModalDel(userFirstName,userLastName);
            break;
    } 
}


const closeModal=function(e){
    if(modal === null) return
    e.preventDefault(); // empeche le comportement classique du lien
    $('#modifnotif').text("");
    // Nettoyage de la boite > décharge les event listener
    modal.removeEventListener('click',closeModal);
    modal.querySelector('.js-modal-close').removeEventListener('click',closeModal);
    modal.querySelector('.js-modal-stop').addEventListener('click',stopPropagation);
    window.setTimeout(function(){
        modal.style.display="none";
        modal=null;
    },200);
    
}

const stopPropagation=function(e){
    // empêche la propagation du click aux parents > empeche de fermer quand on clique dans la fenetre
    e.stopPropagation(); //
}


window.addEventListener('keydown',function(e){
    if(e.key == "Escape" || e.key=="Esc"){
        closeModal(e);
    }
})


$('.row').click(function() {
    var itemNumer= this.id.replace('rowitem_','');
    var cell=$(this).children('.cell');
    var usertId=cell[0].textContent;
    var userFirstName=cell[1].textContent;
    var userLastName=cell[2].textContent;
    //document.cookie='userId='+item;
});



/* function updateModalModif(userId,userFirstName,userLastName){
    document.getElementById('modif-title').textContent="Modifications utilisateur n°"+userId;
    document.getElementById('fname-txt').value=userFirstName;
    document.getElementById('lname-txt').value=userLastName;
} */

function updateModalMsg(userId,userFirstName){

}

function updateModalDel(userFirstName,userLastName){
    document.getElementById('delete-name').textContent=userFirstName+" "+userLastName;
}


// mise en forme des données reçues via AJAX

