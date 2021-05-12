<?php
session_start();
if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
	include "database.php";
		 $customer=$_SESSION['user'];
		 $idcommentaire=$_GET['AB'];
     $idcomment1=$_GET['ID'];
     $isbn=$_GET['I'];
		 if (isset($_POST['submit'])) 
		 { $comment= $_POST["comment"];
		  if(!empty($comment)){
			$nomcomment=$_SESSION['user'];
		  $query = "INSERT INTO reply1 (contenu,nomcomment,idparent,post_time) VALUES ('$comment', '$nomcomment', '$idcomment1', CURRENT_TIMESTAMP)";
		  $result=mysqli_query($con,$query);
		  
		  $last_id = mysqli_insert_id($con);
		  }
		 }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>reponse aux commentaires</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css" />
    <style>
       #books .row{margin-top:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .book-block {margin-top:20px;margin-bottom:10px; padding:10px 10px 10px 10px; border :1px solid #DEEAEE;border-radius:10px;height:100%;}
		 div#c
        {position:relative;
          background-color:black;
		  width:500px;
		  border-radius:5px;
		  box-shadow:5px 5px 2px gray;
		 
        }
		div#bandeau {
          position: relative;
    z-index: 1;
    height: auto;
    width: 500px;
    border-radius:5px;
    max-width: 100%;
	background-color:#00CCFF;

	}
div#contenu {
  position: relative;
    z-index: 1;
    height: auto;
    width: 500px;
    max-width: 100%;
	color:white;
	}
div#piedpage {
  position: relative;
    z-index: 1;
    height: auto;
    width: 500px;
    max-width: 100%;
	color:gray;
	}
	input[type="submit"]{
  border:none;
	background:none;
	background-color:#585858;
	width:100px;
	height:50px;
	color:white;
	border-radius:3px;
	font-size:17px;
	margin-top:20px;
}
.but_envoyer{
  border:none;
	background:none;
	background-color:#585858;
	width:100px;
	height:50px;
	color:white;
	border-radius:3px;
	font-size:17px;
	margin-top:20px;
}
input[type="submit"]:hover{
	cursor: pointer;
  background-color:black;
  color:white;
  
}
	
		
	  </style>
    
    </head>
  
    <body>
      <header>
      <a href="index.php" class="site-logo" aria-label="homepage" style="text-decoration: none; color: black;">EhtpReads<span class="orange"> .</span></a>

        <nav class="account" style="float:left;margin-left:800px;">
        <ul class="nav__list" >
        
        <li class="nav__list-item"> <a  class="nav__link nav__link--btn nav__link--btn--highlight" href="destroy.php"  
        style="text-decoration: none;" > LogOut </a> </li>
        </ul>
      </nav>  
      </header>
      <?php 
   
      ?>
      <section class="ftco-section ftco-project" id="projects-section" style="background: #f4f4f4;
          padding: 20px 0 40px;">
            <div class="container">
      
			<div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h2 class="mb-4">Commentaires-réponses</h2>
                  <div class="divider"></div>
                </div>
              </div>
			  <?php
			 
	  echo '<h3 class="mb-4">répondre au commentaire suivant:</h3>';
	  
	  if(isset($_SESSION['user']))
{  
  $query="SELECT * FROM reply ";
  $result = mysqli_query ($con,$query)or die(mysql_error());
  if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {  
              
               $time=$row['post_time'];
              if($row['id']==$idcomment1)
              { echo '
         <div id="c" style=" margin-left:200px;">
              <div id="bandeau"   >' .$row["nomcomment"]. '</div>
              <div id="contenu"  >'.$row["contenu"].'  </div>
			  <div  id="piedpage"  > '.$time.' </div> 
			  
              </div> <br><br>';
              }
}
		}

		echo '<h4> replies:<hr></h4>';
$j=0;
		 $query="SELECT * FROM reply1 where reply1.idparent='$idcomment1'";
  $result = mysqli_query ($con,$query)or die(mysql_error());
  if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {       
               $time=$row['post_time'];
               echo '
				 <div id="c">
              <div id="bandeau"   > '.$row["nomcomment"]. '</div>
              <div id="contenu"  >'.$row["contenu"].'  </div>
        <div  id="piedpage"  > '.$time.' </div> 
        <a  href="#" >   
              reply                         
             </a> 
			  
              </div> <br><br>';
              $j++;
              
}

  $query="INSERT INTO nbreplies1(idreply,nombre1)values('$idcomment1', '$j')";
  $result = mysqli_query ($con,$query)or die(mysql_error());
      
		}


	?>	
		<form class="form" role="form" method="post" action="#">
		<label class="sr-only" for="comment">comment</label><span style="font-size:large;">répondre au commentaire ici:</span><br>
		<textarea name="comment" style="background-color:black;color:white;font-size:large;" rows="5" cols="60" placeholder="ajouter un commentaire ici"> </textarea>
		<br>
		<input type="submit" value="répondre" name="submit">
		</form>
    <a id="buyLink" href="reply.php?ID=<?php echo $idcommentaire?>&AB=<?php echo $isbn?>" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;"> 
                                   revenir <br>                          
                                 </a>
		<?php     }
		?>
                  
                

                    
                    
            </div>
            </section>
            <script src="js/observers.js"></script>
  </body>
</html>