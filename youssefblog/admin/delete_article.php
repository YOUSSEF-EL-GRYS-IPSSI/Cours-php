<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<?php

include("connexion_bdd/connection_bdd.php");//connexion de la base de données
$PDO=Connection_BDD();
$id=$_GET['id'];
$Stmt=$PDO->exec("SET NAME UTF8");
$Query="DELETE  FROM article  WHERE  id='$id'";								
$Stmt=$PDO->prepare($Query);
$Stmt->execute();
$Count=$Stmt->rowCount();
IF($Count >0){
						echo "
						         <script>
									 $(document).ready(function() {
										window.location.href='article-list.php';});
									     alert('Suppression reussie !');
								</script>";
					 							
					    }										
					   Else{
		                      echo "<script>
												 $(document).ready(function() {
														window.location.href='article-list.php';});
												     alert('Désolé , Suppression non reussi , Veuillez réessayer !');
									  </script>;
							 ";									
							}
			$Stmt->closeCursor();
?>