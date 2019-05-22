function dispTab(tabname){
    
    //var tabtitle=document.getElementsByClassName('tabbutton');
    document.getElementById('ajoutobjets').style.display="none";
    document.getElementById('ordresobjets').style.display="none";
    document.getElementById('ajoutobjetstab').style.backgroundColor="#fff";
    document.getElementById('ordresobjetstab').style.backgroundColor="#fff";

    document.getElementById(tabname).style.display="block";

    document.getElementById(tabname+'tab').style.backgroundColor="#eda04c";

}

function closeOrderTab(){
    var tabs=document.getElementsByClassName('ordercontent');
    for(var i=0;i<tabs.length;i++){
        tabs[i].style.display="none";
    }
}
$(window).on('load',function(e){
    dispTab('ordresobjets');
});


