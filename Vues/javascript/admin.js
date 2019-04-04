var tabcontent=document.getElementsByClassName('tabcontent');
	for (var i = 0; i < 6; i++) {
		tabcontent[i].style.display="none";
	}

	function dispTab(event,tabname){
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
    console.log(e);
    e.preventDefault(); // empeche le comportement classique du lien
    const target=document.querySelector(e.target.getAttribute('data-href')); // récupère la cible du clic
    
    target.style.display=null;
    modal=target;
    modal.addEventListener('click',closeModal);
    modal.querySelector('.js-modal-close').addEventListener('click',closeModal);
    modal.querySelector('.js-modal-stop').addEventListener('click',stopPropagation);
}


const closeModal=function(e){
    if(modal === null) return
    e.preventDefault(); // empeche le comportement classique du lien
    
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
document.querySelectorAll('.js-modal').forEach(img=>{
    img.addEventListener('click',openModal);
    
})

window.addEventListener('keydown',function(e){
    if(e.key == "Escape" || e.key=="Esc"){
        closeModal(e);
    }
})

    