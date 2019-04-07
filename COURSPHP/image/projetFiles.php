<?php
//Verifie si image bien reçu
   if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
   	$error = 1;

    // TAILLE
   	if($_FILES['image']['size'] <= 3000000)
   
     // EXTENSION  
   		$informationImage = pathinfo($_FILES['image']['name']);
   	    $extensionImage = $informationImage['extension']; 
        $extensionArray = array('jpg','png', 'jpeg','gif')

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
<style>
     html, body{
     	margin: 0;
     	font-family: georgia;
         background-color: #161616;

     }
     h1{
     	margin-top: 0;
     	text-align: center;
     }

	header{
		text-align: center;
		background:yellow;
		color: white;	
	}
	.contener{
		width: 1000px; 
		margin: auto;
		

	}
	article{
		margin-top: 50px;
		background:#f7f7f7;
		padding: 10px;
	}
	button{
		text-align: center;
		margin-top: 10px;
		border-top: 5px;
		padding: 10px;

		color: #fff;
		font-size: 1.2rem;
	}
	#image{
		max-width: 100px;
	}
</style>

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