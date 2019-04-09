<?php
//Verifie si image bien reçu
   if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
   	$error = 1;


    // TAILLE
   	if($_FILES['image']['size'] <= 3000000)
   	    var_dump($_FILES);
   
     // EXTENSION  
   		$informationImage = pathinfo($_FILES['image']['name']);
   	    $extensionImage = $informationImage['extension']; 
        $extensionArray = array('jpg','png', 'jpeg','gif');

        if(in_array($extensionImage, $extensionArray))
        {
           
           $adress = 'pictures/'.time().rand().'.'.$extensionImage;

             move_uploaded_file($_FILES['image']['tmp_name'], $adress);

             $error = 0;
           }
        }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projet | Grimm</title>
</head>
<body>
	<header>
		<h1>Photo de profil</h1>
	</header>
	<div class="contener">
		<article>
			<h1>Hébergé une image</h1>
			<?php
			if(isset($error) && $error == 0) 
				echo'<img src="'.$adress.'" id="image" />';

			else if(isset($error) && $error == 1){
				echo "votre image ne peut pas etre envoyé. Vérifier son extension et sa taille (maximum à 3mo)";
			}
			
			?>


			<form method="post"action="projetFiles.php" enctype="multipart/form-data">
				<p>
					<input type="file" required="" name="image"/><br/>
				</p>
				<div style="text-align:center;">
				    <button type="submit">héberger</button>
				</div>	
				
				
			</form>
		
	   </article>
    </div>
	
</body>
</html>