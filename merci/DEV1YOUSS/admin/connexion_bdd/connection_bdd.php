   <?php

function Connection_BDD()
            {
             $bdd='blog'; $user='root'; $password='';
             $dsn="mysql:host=localhost;dbname=$bdd;charset=utf8";
              try
      		    {
                 $pdos=new PDO($dsn,$user,$password);
                }
	         catch(PDOException $e) 
			   {
	                 die("Impossible de se connecter:" .$e->getMessage());
	            }
		     return $pdos;
        }
		


?>
