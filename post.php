 <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46118265-1', 'bockbook.com');
        ga('send', 'pageview');

</script>       

<?php
//démarage d'une session
session_start();


?>
<?php
    
		
		
		//insciption des infos dans la base de donnée
		if(!empty($_POST['nom']) AND !empty($_POST['email'])AND !empty($_POST['objet'])AND !empty($_POST['message']))//si pas vide
	{
                 // Envoi message  saisie par mail 
		$destinataire = "bock812@hotmail.fr";
                $sujet = $_POST['objet'];

                $message .= "Nom : ".$_POST['nom']."\r\n";
                $message .= "Adresse email : ".$_POST['email']."\r\n";
                $message .= "Message : ".$_POST['message']."\r\n";

                $entete = 'From: '.$_POST['email']."\r\n".
                'Reply-To: '.$_POST['email']."\r\n".
                'X-Mailer: PHP/'.phpversion();
                (mail($destinataire,$sujet,$message,$entete));
               	//Header("Location: http://www.kraftylab.com");
                echo "Le mail a bien été envoyé.";
                header('Location:index.php');
		exit();
		
	}

	else 
	{
		echo ('<div id="test"/>Encore mieux avec toutes les infos ;)');
	}
?>

