<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!--Compatibilité IE-->
        <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->
	<!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	<!--[if lte IE 7]>
        <link rel="stylesheet" href="style_ie2.css" />
        <![endif]-->

        <!--GOOGLE ANALYTICS-->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46118265-1', 'bockbook.com');
        ga('send', 'pageview');

        </script>
        <!--icons-->
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="icon" type="image/gif" href="animated_favicon1.gif" >
        <link rel="apple-touch-icon" type="image/png" href="apple-touch-icon.png" />

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="zoombox/zoombox.css" />
        <!--Telechargement bibliotheque jquery-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <!--navigation-->
        <script type="text/javascript" src="js/nav.js"></script>

        <!--Zoombox-->
        <script type="text/javascript" src="zoombox/zoombox.js"></script> <!--visionneuse jquery zoombox-->
        <script type="text/javascript">
        jQuery(function($){
            $('a.zoombox').zoombox();
            /**
            * Or You can also use specific options
            $('a.zoombox').zoombox({
                theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                opacity     : 0,              // Black overlay opacity
                duration    : 600,              // Animation duration
                animation   : false,             // Do we have to animate the box ?
                width       : 300,              // Default width600
                height      : 200,              // Default height400
                gallery     : false,             // Allow gallery thumb view
                autoplay : false,               // Autoplay for video
                overflow : true
            });
            */
        });
        </script>
        <!--fade de chargement de page-->
        <script> type="text/javascript">

                $(document).ready(function(){
                        $("#fader").fadeIn(1500);
                });
        </script>
       <script language="JavaScript1.2">

function ejs_nodroit()
{
alert('Pensez au copyright des photos');
return(false);
}

document.oncontextmenu = ejs_nodroit;
</script>


     </head>

    <?php
    //action sur le dossier miniature, compte le nombre d'image utilis� dans la boucle du portefollio
    function count_files($dir)
    {
                   $num = 0;
                   $dir_handle = opendir($dir);
                           while($entry = readdir($dir_handle))
                                   if(is_file($dir.'/'.$entry))
                                      $num++;
                   closedir($dir_handle);
                   return $num;
    }
    //utilisation de la fonction ci-dessous pour compter le nombre d'images dans le dossier miniature
    $num_images = count_files("miniatures");
    ?>


    <body>
       <!--LEFT-->
        <div id ="left" class="bkg">
             <ul id="nav">

                 <li><a href="#portfolio" class="active">Galerie</a></li><!--la class active permet que le premier lien soit coloré par defaut en css-->
                 <li><a href="#contact">Contact</a></li>
            </ul>
            <div id="signature_blanc">
                 <img src="img/signature.png" id="signature_blanc" alt="signature bock blanc">
            </div>

        </div>
          <!--RIGHT-->

        <div id="fader" style="display: none;"><!--DIV du fader de chargement de page-->
                <div id="right">


                 <div id="portfolio" class="page">
                            <h2>Galerie</H2>

                                <p class="sub-title">portefolio</p>
                                <div id="content" class="content">
                                    <div id="cache">
                                    <ul  class="grid cs-style-7">

                                        <?php for($i=1;$i<$num_images+1;$i++):?>

                                        <li>
                                            <figure>

                                                <?php
                                                //d�finition du lien des images en taille r�elle
                                                $image='images/photo'.$i.'.jpg';
                                                //d�finition du lien des miniatures
                                                $miniature='miniatures/photo'.$i.'_min.jpg';
                                                //lecture fichier d'administration pour alimenter les titres, les tailles, etc ...
                                                $row = 0;
                                                if (($handle = fopen('administration.txt', 'r')) !== false) {
                                                   // Utilisation de la fonction fgetcsv pour lire les lignes et les d�couper en fonction du s�parateur ",".
                                                   // La fonction While permets de boucler et de stocker les donn�es dans un array
                                                   while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                                                       $row++;
                                                       // La premi�re ligne n�est pas prise en compte.
                                                       if ($row == 1) { continue; }
                                                       //stockage des titres
                                                       if($row==$i+1){$titre = $data[1];}
                                                       //stockage des tailles
                                                       if($row==$i+1){$taille = $data[2];}

                                                       if($row==2) {
                                                       }
                                                       //on peux enregistrer ces donn�es dans une base mysql !!!! data[0} correspond au Id,data[1] aux titres, etc...
                                                       //mysql_query('insert into nom_de_ta_table (id, titre) VALUES (\'' . $data[1] .'\', \'' . $data[3] .'\')');
                                                        }
                                                        fclose($handle);
                                                        }

                                                        ?>
                                                 <?php echo '<a href="'.$image . '" class="zoombox zgallery1">';?>
                                                    <span class="title"><?php echo $titre?></span>
                                                    <span class="descr">Taille: <?php echo $taille?></span>
                                                    <span class="bg"></span>
                                                 <?php echo '<img src=" ' . $miniature . '" alt="photo'. $i . '"'; ?>
                                                <figcaption>
                                                </figcaption>
                                                </a>
                                            </figure>
                                        </li>
                                        <?php endfor; ?>
                                    </ul>
                                  </div>
                              </div>


                                  <div id="content_iphone">
                                    <ul  class="grid cs-style-7">

                                        <?php for($i=1;$i<$num_images+1;$i++):?>

                                        <li>


                                                <?php
                                                //d�finition du lien des images en taille r�elle
                                                $image='images/photo'.$i.'.jpg';
                                                //d�finition du lien des miniatures
                                                $miniature='miniatures/photo'.$i.'_min.jpg';
                                                //lecture fichier d'administration pour alimenter les titres, les tailles, etc ...
                                                $row = 0;
                                                if (($handle = fopen('administration.txt', 'r')) !== false) {
                                                   // Utilisation de la fonction fgetcsv pour lire les lignes et les d�couper en fonction du s�parateur ",".
                                                   // La fonction While permets de boucler et de stocker les donn�es dans un array
                                                   while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                                                       $row++;
                                                       // La premi�re ligne n�est pas prise en compte.
                                                       if ($row == 1) { continue; }
                                                       //stockage des titres
                                                       if($row==$i+1){$titre = $data[1];}
                                                       //stockage des tailles
                                                       if($row==$i+1){$taille = $data[2];}

                                                       if($row==2) {
                                                       }
                                                       //on peux enregistrer ces donn�es dans une base mysql !!!! data[0} correspond au Id,data[1] aux titres, etc...
                                                       //mysql_query('insert into nom_de_ta_table (id, titre) VALUES (\'' . $data[1] .'\', \'' . $data[3] .'\')');
                                                        }
                                                        fclose($handle);
                                                        }

                                                        ?>



                                                 <?php echo '<img src=" ' . $image . '" alt="photo'. $i . '"'; ?>



                                        </li>
                                        <?php endfor; ?>
                                    </ul>
                                  </div>

                    </div>

                    <div id="contact" class="page">
                         <h2>Contact</H2>
                                <p class="sub-title">contact</p>
                                <div class="bloc">
                                    <h3>N'hesitez pas à me contacter</h3>
                                    <p>
                                    Pour une commande, un projet, une collaboration...
                                    <br/>via le formulaire ci-dessous ou directement via mon
                                    <a href="mailto:bock812@hotmail.fr">mail</a>
                                    </p>
                                   <form action ="post.php"id="form" method="post">

                                        <label for= "nom">Nom:</label>
                                        <input type= "text" class="text" name="nom" id="nom">

                                        <label for= "email">email:</label>
                                        <input type= "text" class="text" name="email" id="email">

                                        <label for= "objet">Objet</label>
                                        <input type= "text" class="text" name="objet" id="sujet">

                                        <label for="message">Message:</label>
                                        <textarea class="text" name="message" id="message" rows="5" cols="10"></textarea>

                                        <input type="submit" class="submit" value="Envoyer">

                                    </form>
                                </div>
                    </div><!--DIV du fader de chargement de page-->

                    <div id="webmaster">
                        <p>Webmaster : <a href="mailto:gilberterwan@gmail.com"><strong>Erwan Gilbert</strong></a></p>
                    </div>

       </div>
         <!--survol photo-->
        <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>
