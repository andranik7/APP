<!DOCTYPE html>
<html>
<head>
    <title>Page Test </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style_test.css">


    
   
</head>

<body style="background-color:#364970;">


    <header>

        <?php 

        $bdd = new PDO('mysql:host=localhost;dbname=App;charset=utf8', 'root', 'root');

        // Check connection
        if (!$bdd) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";



         ?>
        
    </header>
    <section>
        
            <div class='Panneau'>
                <h1>Panneau de contrôle</h1> 
                <div class="Button"  >
                    
                                    <button class="Button_t"  onclick="changePage(1)">Consigne</button>
                                    <button class="Button_t" onclick="changePage(2)" >Visualisation</button>
                                    
                        </div>
                    
                </div>  <!-- 添加注释 -->

                
                    <div class="Consigne_1" id="1" >
                        <form method="post" action="./BDD.php">
                        
                        <table frame="void"  cellpadding="3" cellspacing="0" style="width: 80%; margin:auto"> <!-- Dessiner un tableau -->
                                    <tr>
                                        <th><h2><p style="color:#eba338;">Active</p></h2></th>
                                        <th><h2><p style="color:#eba338;">Consigne</p></h2></th>
                                        <th><h2><p style="color:#eba338;">Valeur</p></h2></th>
                                        <th><h2><p style="color:#eba338;">Actuel</p></h2></th>
                                    </tr>
                                    <tr>
                                        <td align="middle"><label><input type="checkbox" name="light" style="color: "></label></td>
                                        <td align="middle"><h3>lumière</h3></td>
                                        <td align="middle">
                                       
                                            <input type="number" name="" placeholder="10" id="k1" required style="font-size:15px;" min="10"max="30"step="5">
                                        

                                        </td>
                                        <td align=middle><h3 style="color: white">
                                            <?php


                                              $light = $bdd->query("SELECT valeur FROM Consigne WHERE id=0" );

                                              while ($donnees = $light->fetch() )
                                             {

                                             echo '<p value="'.$donnees["id"].'";>'
                                               .$donnees['valeur'];
                                              echo "</p>";
                                            }
    

                                            ?>
                                                
                                            </h3>
                                              
                                        </td> 


                                    </tr>
                                    
                                    <tr>
                                        <td align="middle"><label><input type="checkbox" name="distance"></label></td>
                                        <td align="middle"><h3>distance</h3></td>
                                        <td align="middle">
                                        

                                            <input type="number" name="distance" placeholder="5" id="k1" required style="font-size:15px;" min="5"max="100"step="5">
                                        
                                        </td>
                                        <td align=middle><h3 style="color: white">
                                            <?php


                                              $reponse = $bdd->query("SELECT valeur FROM Consigne WHERE id=1" );

                                              while ($donnees = $reponse->fetch() )
                                             {

                                             echo '<p value="'.$donnees["id"].'";>'
                                               .$donnees['valeur'];
                                              echo "</p>";
                                            }
                                        

                                            ?>
                                                
                                            </h3>
                                              
                                        </td>  
                                    </tr>
                                    <tr>
                                        <td align="middle"><label><input type="checkbox" name="temperature"></label></td>
                                        <td align="middle"><h3>temperature</h3></td>
                                        <td align="middle">

                                            

                                            <input type="number" name="temperature" placeholder="25" id="k1" required style="font-size:15px;" min="25"max="60"step="5">
                                       
                                        </td> 
                                        <td align=middle><h3 style="color: white">
                                            <?php


                                              $reponse = $bdd->query("SELECT valeur FROM Consigne WHERE id=2" );

                                              while ($donnees = $reponse->fetch() )
                                             {

                                             echo '<p value="'.$donnees["id"].'";>'
                                               .$donnees['valeur'];
                                              echo "</p>";
                                            }
                                        

                                            ?>
                                                
                                            </h3>
                                              
                                        </td> 
                                    </tr>

                                    <tr>
                                        <td align="middle"><label><input type="checkbox" name="sound"></label></td>
                                        <td align="middle"><h3>son</h3></td>
                                        <td align="middle">
                                       

                                            <input type="number" name="sound" placeholder="10" id="k1" required style="font-size:15px;" min="10"max="30"step="5">
                                        

                                        </td> 
                                        <td align=middle><h3 style="color: white">
                                            <?php


                                              $reponse = $bdd->query("SELECT valeur FROM Consigne WHERE id=3" );

                                              while ($donnees = $reponse->fetch() )
                                             {

                                             echo '<p value="'.$donnees["id"].'";>'
                                               .$donnees['valeur'];
                                              echo "</p>";
                                            }
                                        

                                            ?>
                                                
                                            </h3>
                                              
                                        </td> 

                                    </tr>
                                    <tr>
                                        <td align="middle"><label><input type="checkbox" name="actionneur"></label></td>
                                        <td align="middle"><h3>actionneur</h3></td>
                                        <td align="middle"></td>
                                    </tr>
                                </table>   
                                <p> <bar /></p>         
                                
                                 
                     
                     
                             <input type="submit" value="Valider">
                             <button type="button"  id="valide" onclick="showSite()">VALIDER</button>

                             <?php
                                 //$userId=100;
                             ?> 
                             <script>
                                // var userId;
                                // userId=document.getElementById("userId").value;
                                // alert(userId);
                             </script>
                            <!-- <input type="text" name="userId" id="userId" value="<?php echo $userId; ?>"> -->

                             <?php
/*                                          Ceci qui marche:
                                              $reponse = $bdd->query("SELECT valeur FROM Consigne " );
                                              while ($donnees = $reponse->fetch() )
                                             {
                                                foreach ($donnees as $key => $value) 
                                                {
                                                  echo "$value <br>";
                                                  
                                                }
                                              }  
*/
                                    //Ceci ne marche pas
                                     function les_nums(){  //Pour obtenir les valeurs de capteurs en un arry à realiser les graphiques suivantes
                                        $bdd = new PDO('mysql:host=localhost;dbname=App;charset=utf8', 'root', 'root');
                                        $reponse = $bdd->query("SELECT valeur FROM Consigne " );
                                             while ($donnees = $reponse->fetch() )
                                             {
                                                foreach ($donnees as $key => $value) 
                                                {
                                                  //echo "$value <br>";
                                                  return $value;
                                                }
                                                
                                            } 
                                        }

                                        les_nums();
                                        arr=les_nums();
                            ?>
                             
                             
                         
                     </form>  
                    </div>

                    <div class="Visualisation_1" id="2">




                        <div class="Cercle">
                            
                            <canvas  id="canvas" width="450" height="300" style="border: 0px;"></canvas>
                        </div>

                     

                        <div class="Grid"> 
                         <canvas id="can1" width="1260" height="324"></canvas>
                        </div>


                        <div class="Color">
                            <h4 id="a11"> Lumière</h4>
                            <h4 id="a12"> Distance</h4>
                            <h4 id="a13"> Température</h4>
                            <h4 id="a14"> Son</h4>
                        
                        </div>
                       

                        <div class="Total">
                            <canvas id="total" width="1260" height="40"></canvas>
                            <script type="text/javascript">
                                /*var total=document.getElementById('total');

                                            //Pour le title//
                                            var total= total.getContext("2d");
                                            total.fillStyle = "white";
                                            total.font = "20px Arial";
                                            total.fillText("La consomations d'énergie au total:", 80, 30);*/
                                
                            </script>
                        </div>



            
                    </div>

                    
                
            </div>

            

            
          
        
    </section>



        <script type="text/javascript">
           
                
                



           /* function showSite(str)
            {
                if (str=="")
                {
                    document.getElementById(k1).innerHTML="";
                    return;
                } 
                if (window.XMLHttpRequest)
                {
                    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                    xmlhttp=new XMLHttpRequest();
                }
                else
                {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function()
                {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById(k1).innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","BDD.php?q="+str,true);
                xmlhttp.send();
            }*/

        //Changer les pages

            // on initialise l'étape
            let step= 1;
            changePage(1); // pour se mettre à l'étape 1 dès le départ
            var initial=document.getElementById(1);

            // fonction pour changer l'étape

            function changePage(s)
            {
                step=s;
                if (1==s)
                 {
                    document.getElementById(1).style.display = "flex"
                    document.getElementById(1);
                    document.getElementById(2).style.display = "none"

                }
                else{
                    document.getElementById(2).style.display = "flex"
                    document.getElementById(2);
                    document.getElementById(1).style.display = "none"
                }


            }

/*
            $('valide').click(function(){
                        $.ajax({
                            cache:true,//保留缓存数据
                            type:"GET",//为post请求
                            url:"ecomatiqueSAUVEGARDE",//这是我在后台接受数据的文件名
                            data:$('#loginForm').serialize(),//将该表单序列化
                            async:true,//设置成true，这标志着在请求开始后，其他代码依然能够执行。如果把这个选项设置成false，这意味着所有的请求都不再是异步的了，这也会导致浏览器被锁死
                            error:function(request){//请求失败之后的操作
                                return;
                            },
                            success:function(data){//请求成功之后的操作
                                console.log("success");
                            }
                        });
                    });
            
*/            

        //Le grid---Canvas1

            
            //Le grid---Canvas1

                var canvas1=document.getElementById('can1');
                var title1= canvas1.getContext("2d");
                title1.fillStyle = "#eba338";
                title1.font = "20px Arial";
                title1.fillText("Les consomations d'énergie (en Watt)", 80, 15);

                var can1 = document.getElementById("can1");
                var ctx1 = can1.getContext("2d");

//Qui besoin d'utiliser la fct les_nums() pour un array de $valeur
                var nums ="<?php echo $arr?>" ; //赋值
                    alert(nums);
                 //var nums = [90,150,280,51];
                // Calculer sum
                                function sum()
                                {

                                 var sum = 0;
                                  for (let i = 0; i < nums.length; i++)
                                  {
                                        sum += nums[i];
                                    }
                                     return sum;
                                  }

                                  
                                  console.log(sum(nums));

                  var a_sum=sum(nums);


                  var total=document.getElementById('total');

                                                              //Pour le title//
                        var total= total.getContext("2d");
                        total.fillStyle = "white";
                        total.font = "20px Arial";
                        total.fillText("La consomations d'énergie au total : "+a_sum+"Watt", 80, 30);


                        function percentage (){
                           var percent = [];  
                           var zzz=0;                     //var sum = 521;
                            for(let j = 0;j<nums.length;j++)
                            {
                                zzz=nums[j]/a_sum;
                                zzz.toString();
                                //Round des chiffres
                                var num =parseFloat(zzz); //typeof(num)  number
                                num = num.toFixed(2); // String
                                aaa=Number(num);
                                percent.push(aaa);

                            }
                            return percent;
                        }

                        console.log(percentage(nums));
                        //var value=percentage(nums);
                        

                var colors = ["#F5B041","#EB984E","#F5CBA7","#FAD7A0"]
                var cols = (can1.width - 1000)/nums.length;//逐个柱子占位宽度和间距共1000
                var colGaps = 30;//largeur de rect
                // Dessiner le grid
                function drawRows(){
                    var rows = 10.8;
                    //列步长
                    var x_9=can1.height;
                    var rW = can1.height/rows;
                    //console.log("the valeur of x_9:");
                    //console.log(x_9);
                    //console.log("the valeur of rW:");
                    //console.log(rW);

                    for (var i = 0 ; i <= rows; i ++){
                        ctx1.beginPath();
                        //Dessiner les lignes
                        ctx1.moveTo(90,i*rW+30);
                        //console.log("the valeur of i*rW:")
                        //console.log(i*rW);
                        ctx1.lineTo(can1.width/4+colGaps,i*rW+30);
                        //console.log("the valeur of right point - x")
                        //console.log(can1.width/4+colGaps);

                        ctx1.moveTo(90,324);
                        ctx1.lineTo(can1.width/4+colGaps,324);


                        //绘制坐标点
                        ctx1.font = "15px scans-serif";
                        ctx1.fillStyle = "white";
                        ctx1.strokeStyle="white";
                        var colsNo = ctx1.measureText(i*30);//
                        ctx1.fillText(i*30,79-colsNo.width,can1.height - i*28.5);//changer l'hauteur et la distance des chiffres 
                        //Tracez le côté gauche de l'icône pour éviter de redéfinir la façon de la dessiner, placez-la dans la boucle, dessinez 10 fois dans la même position.
                        ctx1.moveTo(90,30);
                        ctx1.lineTo(90,can1.height);
                        ctx1.closePath();
                        ctx1.stroke();

                    }
                }
                //dessiner les rects & les chifres au dessus
                function drawRects(){
                    for (var i = 0;i < nums.length; i ++){
                        //les rects
                        ctx1.lineWidth = 1;
                        ctx1.strokeStyle = "white";
                        ctx1.fillStyle = colors[i];
                        ctx1.beginPath();
                        ctx1.rect((i+1)*cols+25,can1.height-nums[i]+6,colGaps,nums[i]);//x,y,width,height //+25 pour les positions de l'axisx sont egales
                        //console.log("high")
                        //console.log(can1.height-nums[i]+6);
                       // console.log(can1.height-nums[i]);
                        ctx1.fill();
                        //les chiffres 
                        ctx1.font = "18px scans-serif";
                        ctx1.fillStyle = "white";// changer la coulor de chiffre
                        var text = ctx1.measureText(nums[i]);
                        ctx1.fillText(nums[i],(i+1)*cols+(colGaps-text.width)/2+25,can1.height-nums[i]-5);//text,x,y,maxWidth

                        ctx1.closePath();
                        ctx1.stroke();
                    }
                }
                drawRows();// dessiner les lignes et la coordonnee
                drawRects();//dessiner les rects et les chiffres




                //Le cercle-----Canvas

                var canvas=document.getElementById('canvas');

                    //Pour le title//
                    var title= canvas.getContext("2d");
                    title.fillStyle = "#eba338";
                    title.font = "20px Arial";
                    title.fillText("Les taux de consomations d'énergie", 80, 25);

                    //Pour le cercle//
                    var ctx=canvas.getContext('2d');



                    //Créer les data
                    var data_capteur = [
                        {name:'lumière', color:'#F5B041'},
                        {name:'distance', color:'#EB984E'},
                        {name:'température', color:'#EDD7AA'},
                        {name:'son', color:'#FAD7A0'},
                        //{name:'actionneur', color:'EDA04C', value:0.25}   
                    ];

                    


                    var value=percentage(nums);
                    //var value=[0.17,0.19,0.54,0.1];//en ordre des types de capteurs 
                    console.log(typeof(value));

                     //Définir le centre du cercle
                    var x0 = canvas.width * 0.5, y0 = canvas.height * 0.60;//显示在画布中间
                     //Définir le rayon
                    var radius = 90;
                     //Définir l'angle de départ
                    var beginAngle = -90 *Math.PI/180;//(angle initial :-90deg)
                     //Traverse, dessine un éventail
                    for (var i = 0; i < data_capteur.length; i++) {
                        //angle de ventilation
                        var tempAngle = value[i] * 360 *Math.PI/180;
                        //angle de fin
                        var endAngle = beginAngle + tempAngle;

                        ctx.beginPath();
                        //point de départ
                        ctx.moveTo(x0, y0);
                        //radians de dessin
                        ctx.arc(x0, y0, radius, beginAngle, endAngle);
                        //Définir la coulor
                        ctx.fillStyle = data_capteur[i].color;
                        //Remplir la coulor
                        ctx.fill();

                        //Pour le text_capteur
                        var textAngle = beginAngle + tempAngle * 0.5; //l'angle du text_capteur
                        var text_capteur = data_capteur[i].name + ' '+value[i] * 100 + '%';
                        console.log(text_capteur);
                        //Coordonnée du text
                        var text_X = x0 + (radius + 10) * Math.cos(textAngle);
                        var text_Y = y0 + (radius + 30) * Math.sin(textAngle);
                        
                        ctx.font = "15px 'Roboto'";
                        //Déterminer si le texte est à gauche
                        if((textAngle > 90 *Math.PI/180) && (textAngle < 270 *Math.PI/180) ) {
                            ctx.textAlign = 'end';//Le côté droit du texte se trouve à l'extrémité gauche de la ligne de base
                        }
                        //Draw text
                        ctx.fillText(text_capteur, text_X, text_Y);
                        //Mettez à jour l'angle de départ et utilisez l'angle de fin du secteur actuel comme angle de départ du secteur suivant.
                        beginAngle = endAngle;
                    }

        </script>
    

    
    
    
    
</body>
</html>
