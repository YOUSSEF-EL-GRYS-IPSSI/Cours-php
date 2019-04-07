<?php
 $capital=0;
 $taux=0;
 $annee=0;
 echo"<form action='' method='post' class='form'>
       
       <h2>Prêt immobilier Calcul des mensualités </h2>";    
       echo"
        Capital Emprunté €: 
          <input type='text' placeholder='Capital Emprunté €...' name='capital' id='capital' value='' size='10' maxlength='10'/>
         
         Durée du Prêt (en année) : 
          <input type='text' placeholder='Durée du Prêt (en année) ...' name='duree' id='duree' value='' size='10' maxlength='10'/>
         Taux d'Intérêts (en %) : 
          <input type='text' placeholder='Taux des Intérêts (en %) ...' name='taux' id='taux' value='' size='10' maxlength='10'/>
         
         <button type='submit' id='envoyer' name='envoyer' title='' value='Envoyer'> <span>Calculer</span> </button>
           
     </form>
    ";

 if(isset($_POST['envoyer'])) {
  $capital=floatval($_POST['capital']);
  $taux=floatval($_POST['taux']);
  $duree=floatval($_POST['duree']);

  if($capital>0 && $taux>0 && $duree>0){
   $annuel = $capital*$taux/(1-(1+$taux)-$duree);
   $mensualite=$annuel/12;
   $mensualite=$mensualite *-1;

   $mensualite=number_format($mensualite, 2, ',', ' ');
   echo "<div class='textField blanc textecentrer'><h2>Votre Mensualité sera de : ".$mensualite." € </h2></div>";
  }
  else
  {
   echo"<div class='textField blanc textecentrer'><h2>Veuillez renseigner tous les champs</h2></div>";
  }
 }
 

?>