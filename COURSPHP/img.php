<?php

// envoie fichier en php
 

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0 ){

     	if ($_FILES['image']['size'] <= 3000000){

            $informationsImage = pathinfo($_FILES['image']['name']);

            $extensionImage = $informationsImage['extension'];

            $extensionArray = array('png','gif','jpg','jpeg');

            if(in_array($extensionImage,$extensionArray)){

            	move_uploaded_file($_FILES['image']['tmp_name'],'pictures/'.time().rand().'.'.$extensionImage);
            	echo 'envoie bien reussi !';
            }

     	}
    }

    echo '<form method="post" action="img.php" enctype="multipart/form-data">
    <p>
       <h1>Formulaire</h1>
       <input type="file" name="image"/><br/>
       <button type="submit">Envoyer</button
    </p>

        
        
        </form>';

 