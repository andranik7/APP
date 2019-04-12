var tabcontent=document.getElementsByClassName('tabcontent');

for (var i = 0; i < 6; i++) {
    tabcontent[i].style.display="none";
}

function dispTab(event,tabname){
    var tabcontent=document.getElementsByClassName('tabcontent');
    
    var tabtitle=document.getElementsByClassName('tabbutton');
    for (var i = 0; i < 6; i++) {
        console.log(tabcontent[i]);
        tabcontent[i].style.display="none";
        tabtitle[i].style.backgroundColor='#556fb2';
    }
    document.getElementById(tabname).style.display="block";
    document.getElementById(tabname+"btn").style.backgroundColor='#eba338';
}