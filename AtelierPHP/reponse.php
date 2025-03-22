<html>
<head>
<title> Atelier 5 </title>
</head>
<body>
<div align="center">
<table style="border: solid red; width:600; height:300;">
<tr> 
<td>
<?php 
 $err=0;
 if($_POST["nom"]=="") 
   {
	echo "<font color='red'> Erreur : Nom manquant ! <br \><br \></font>";
    $err=1;
   }
 if (!isset($_POST["genre"])) 
   {
	   echo "<font color='red'> Erreur : Genre non précisé ! <br \><br \></font>"; 
	   $err=1;
   }
if (!isset($_POST["civil"])) 
   {
	   echo "<font color='red'> Erreur : Civilité non précisée ! <br \><br \></font>"; 
	   $err=1;
   }   
if (!isset($_POST["statut"])) 
   {	
       echo "<font color='red'> Erreur : Aucun choix ! <br \><br \></font>"; 
	   $err=1;
   }
if($err) echo "<br><h4 style='text-align:center;'><a href='index.html'> Revenir au formulaire</a></h4>";
  else	
  {
	$msg='Bienvenue';
	if ($_POST["genre"]=='m') $msg.=' Monsieur ';
	else if ($_POST["civil"]=='m') $msg.=' Madame ';
	 else $msg.=' Mademoiselle ';
	$msg.=$_POST["nom"];
    echo "<h2> $msg </h2><br>";
	echo "Nom :".$_POST["nom"]."<br \>";
	if($_POST["genre"]=='m') echo "Genre : Féminin <br \>";
      else	echo "Genre : Masculin <br \>";
    if($_POST["civil"]=='m') echo "Civilité : Marié <br \>";
      else	echo "Civilité : Célibataire <br \>";
	echo "Statut : ".$_POST["statut"]."<br \>";
  }
?>
</td></tr></table></div>
</body>
</html>