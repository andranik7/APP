$(document).ready(function(){
    //If user submits the form
    $("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("Modeles/postMessage.php", {text: clientmsg});            
        $("#usermsg").attr("value", "");
        loadLog();
        $("#usermsg").val('');
        return false;
    });
    //If user wants to end session
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true){window.location = 'index.php?logout=true';}      
    });
    //Load the file containing the chat log
    function loadLog(){   
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.post("Modeles/getMessages.php", function (html){
            console.log(html)
            $("#chatbox").html(html);  
            
            //Auto-scroll           
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            }    
        });  
    }
     // on reload l'AJAX toutes les 2.5 secondes
});

$(window).on('load',function(e){
    //updateListTech();
    if($('#bodymsg').length>0) setInterval (loadLog, 2500);
  });