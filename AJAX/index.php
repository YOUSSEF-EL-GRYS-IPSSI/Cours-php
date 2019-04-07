<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" />
  <style>
    .success, .error {
      color: white;
      padding: 5px;
      margin: 5px 0 15px 0;
    }
    .container h1{
        background-color: #ff000d;
        color: #fff;
        text-align: center;
    }

    .success {
      background: green;
    }

    .error {
      background: red;
    }
  </style>
  <title>Ajouter un Article</title>
</head>
<body>
  <div class="container">
  <div class="container">
    <h1>Ajouter un livre</h1>
    <form id="book-form">
      <div>
        <label for="title">Titre</label>
        <input type="text" id="title" class="u-full-width">
      </div>
      <div>
        <label for="author">Auteur</label>
        <input type="text" id="author" class="u-full-width">
      </div>
      <div>
        <label for="isbn">ISBN#</label>
        <input type="text" id="isbn" class="u-full-width">
      </div>
      <div>
        <input  type="submit" id="submit" value="Valider" class="u-full-width">
      </div>
    </form>
    <table class="u-full-width">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Auteur</th>
          <th>ISBN</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="book_list"></tbody>
    </table>
  </div>
  
  <script type="text/javascript" src="7777jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



  
  <script type="text/javascript">

  $(document).ready(function() {
       

      $('#submit').click(function(e){
		  
          if(confirm('Voulez vous confimer enregistrement de ce article ?'))

        {
        e.preventDefault();
        const  title=$("#title").val();
        const  author=$("#author").val();
        const  isbn=$("#isbn").val();
		

     
	   
        $.ajax({

            type: "POST",
            url: "insert.php",
            dataType: "json",
            data: {title:title,author:author,isbn:isbn},
            success : function(data){
				
		  if(data="success"){
                 alert('Article enregistré');
			     $('#book-form')[0].reset();
			     load_comment();
             }else{
                alert('Article non enregistré');

             }
            
             
          
            }

        });
	  }
      });
	
	  load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#book_list').html(data);
   }
  })
 }
 
  
  
  
 


  
  
    $(document).on('click', '#delete_product', function(e){
		   if(confirm('Voulez vous confimer  la suppression de cer article '))

        {
        
		 const  id=$(this).data('id');
		  e.preventDefault(); 
            $.ajax({
               url: 'delete.php',
               type: 'POST',
               data: {id:id},
               error: function() {
                // load_comment();
               },

               success: function(data) {
                    load_comment();

               }

            });

        }

    });

 
 
  });
</script>


<script type="text/javascript">

   

</script>

 <!-- <script src="////appes6.js"></script>-->
</body>
</html>