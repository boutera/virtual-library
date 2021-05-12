<?php 
    session_start();
    include "database.php";
    $db = mysqli_connect("localhost", "root", "", "ehtpreads");
    include ('functions.php');
    $isbn=$_GET['ID'];
    $loggedIn = false;
    if(isset($_SESSION['user'])){$loggedIn = true;}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>EhtpReads</title>
    
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
    <link rel="stylesheet" type="text/css" href="css/posts.css" />
    <script src="js/books.js"></script>
    
  </head>

  <body>
    <header>
      <a href="#" class="site-logo" aria-label="homepage" style="text-decoration: none; color: inherit;">EhtpReads<span class="orange"> .</span></a>
      <?php

      if($loggedIn){
      echo'<nav class="main-nav">
        <ul class="nav__list"  >
          <li class="nav__list-item"><a href="accueil.php" class="nav__link" style="text-decoration: none; color: inherit;">Accueil</a></li>
          <li class="nav__list-item">
            <a href="index.php" class="nav__link"  style="text-decoration: none; color: inherit;">Mon espace</a>
          </li>
          <li class="nav__list-item">
            <a href="biblio.php" class="nav__link" style="text-decoration: none; color: inherit;">Mes livres</a>
          </li>


        </ul>
        
      </nav>

      <nav class="account">
        <ul class="nav__list" >
        <li class="nav__list-item"> <span href="#" class="nav__link" style="text-decoration: none;color: inherit;font-size:large;"> ' .$_SESSION['user']. '</span></li>
        <li class="nav__list-item">
            <a
              class="nav__link nav__link--btn nav__link--btn--highlight"
              href="destroy.php"  style="text-decoration: none;"
              >Se déconnecter</a
            >
          </li>
          
        </ul>
      </nav>';}
      else{
        echo'<nav class="main-nav">
        <ul class="nav__list"  >
          <li class="nav__list-item"><a href="index.php" class="nav__link" style="text-decoration: none; color: inherit;">Accueil</a></li>

        </ul>
        
      </nav>

      <nav class="account">
      <ul class="nav__list" >
        <li class="nav__list-item">
          <a class="nav__link nav__link--btn" href="login.php" style="text-decoration: none;">Se connecter</a>
        </li>
        <li class="nav__list-item">
          <a
            class="nav__link nav__link--btn nav__link--btn--highlight"
            href="register.php"  style="text-decoration: none;"
            >S\'inscrire</a
          >
        </li>
      </ul>
    </nav>';}
      
      ?>
      
    </header>


    <main>
      <section class="home-intro" id="about">
        <div class="container">
          <div class="row">
            <div class="col-md-12 ">
              <h1><span style="color: #D4AF37;">EhtpReads</span> : La bibliothèque éléctronique de<br>l'école Hassania des Travaux Publics</h1>
            </div>
            
            
          </div>
        </div>
      </section>

       <?php

        $statement = mysqli_query($db, "SELECT * FROM livre WHERE isbn = '$isbn'");
        $book = mysqli_fetch_assoc($statement);

        echo '<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="author-section" style="margin-top: 40px">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/'.getImageByBookId($isbn).');">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="py-md-5 w-100 bg-light px-md-5">
    					<div class="py-md-5">
		    				<div class="row justify-content-start pb-3">
				          <div class="col-md-12 heading-section ftco-animate">';
				          echo '  <h2 class="mb-4">'.getBookTitleById($isbn).'</h2> ';
				           echo' <p>'.$book['description'].'</p>
				            <ul class="about-info mt-4 px-md-0 px-2">
				            	<li class="d-flex"><span>Auteur :</span> <span>'.getAuthorNameById($book['idAuteur']).'</span></li>
				            	<li class="d-flex"><span>Genre :</span> <span>'.getGenreById($isbn).'</span></li>
                                <li class="d-flex"><span>Publié le :</span> <span>'.$book['dateDeCreation'].'</span></li>
                                <li class="d-flex"><span>Note :</span> <span><i class="fas fa-star glow"></i> ';if(getTotalRatingById($isbn)==NULL) { echo'aucune note'; }else{echo getTotalRatingById($isbn);} echo'</span></li>
				            	
				            </ul>
				          </div>
                </div>';

                if($loggedIn){
                    if(!getRatingById($_SESSION['id_user'],$isbn)){

                          echo '  <form method="POST"  class="rating-form" id="rating-form" action="description.php?ID='.$isbn.'"   Enctype ="multipart/form-data;">  
                                    <div class="form-group"> 
                                            <div  style="padding-top: 10px;  font-family: "Raleway"; font-weight : bold; ">Évaluez ce livre :</div>
                                            <div class="rating "><br>
                                                <input type="hidden" name="idLivre" value="'.$isbn.'" />
                                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="J\'adore">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="J\'aime bien">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="J\'aime">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Je n\'aime pas">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Je déteste">1 star</label>
                                            </div>
                  
                                    </div>
                                    <div class="form-actions">
                                    
                                    <button type="submit"  class="btn " style="color: black; margin:13px 0 0 10px;"> Envoyer</button>
                                
                                </div>
                                <span class="help-inline"><?php ?></span>

                                </form>';}
                      else{
                        echo '<div  style="padding-top: 10px; font-family: "Raleway"; font-weight : bold; ">Votre évaluation : </div>
                        ';stars(getRatingById($_SESSION['id_user'],$isbn));
                      }
                }
                else{
                  echo ' <div  style="padding-top: 10px;  font-family: "Raleway"; font-weight : bold; ">Veuillez <a href="login.php">se connecter</a> pour évaluer ce livre</div>';
                }

            echo '<div class="nav__list-item" style="margin-top: 50px; float: right;">
                <a class="nav__link nav__link--btn nav__link--btn--highlight" href="auteur.php?ID='.$book['idAuteur'].'"  style="text-decoration: none; margin-bottom: 10px;" >En savoir plus sur l\'auteur</a>
            </div>
        
			        </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>';

    ?>

    <div class="main-section">
      <div class="content">
        <div class="top-section">
           <?php
       echo ' <div class="count-btn">';
                  echo '<button class="btn">'.getCommentCountByBookId($isbn).' comments</button>';
               echo' </div>
                <div class="enter-btn">
                  <button class="btn"><i class="fas fa-eye"></i></button>
                </div>
                <div style="clear:both;"></div>';

            $statement = mysqli_query($db, "SELECT * FROM book_comments WHERE idLivre = '$isbn'");


          echo '<div class="sub-comment">';
          while($comment = mysqli_fetch_assoc($statement)) {
            $path="discussion2.php?comment=".$comment['idComment']."&idLivre=".$comment['idLivre']."";
            
            echo '<div class="example">
                    <div class="comment-img"><img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" class="example"></div>
                    <div class="comment">';
            echo '<div class="user-detail">';
            echo '<p>'.getUserNameById($comment['idUtilisateur']).'</p>';
            echo '<span style="float : right; margin-top: 27px;">'.stars(getRatingById($comment['idUtilisateur'],$isbn)).''.date('M', strtotime($comment['dateCreation'])).'  '.date('j', strtotime($comment['dateCreation'])).' , '.date('Y', strtotime($comment['dateCreation'])).' at  '.date('H', strtotime($comment['dateCreation'])).':'.date('i', strtotime($comment['dateCreation'])).'</span>';
            echo '<a href="'.$path.'">répondre('.getReplyCountByIdComment($comment['idComment']).')</a>';
            echo '</div>';
            echo'            <p style="margin-top: 0px;">'.$comment['contenu'].'</p> ';
            echo'        </div>
                    <div style="clear:both;"></div>
                  </div>';

          }
          echo '</div>';
          
          
         echo ' <div class="comment-box box">              
                <div class="comment-btn">';
                if($loggedIn){               
                  echo '<input type="textarea" class="text" rows="10" cols="30" placeholder="Donner un avis...">';}
                else{
                  echo ' <div  style="padding: 10px 0 10px 70px;  font-family: "Raleway"; font-weight : bold; ">Veuillez <a href="login.php">se connecter</a> pour laisser un commentaire</div>';
                }
                echo '</div>
              </div>
      </div>
    <div class="add-comment">
        <div class="box">
          <div class="add-comment-img">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png">
          </div>
          <div class="add-comment-text">';

          echo '<form method="POST"  class="comment-form" action="description.php?ID='.$isbn.'" Enctype ="multipart/form-data;">';
          echo '<input type="hidden" name="idLivre" value="'.$isbn.'" />';
          echo'    <div class="form-group">
                <textarea rows="5" class="example-textarea" name="comment" required  placeholder="Ajouter un commentaire"></textarea><br>
                
              </div>

              <div class="form-actions">
                  
                <button type="submit" class="post-comment-btn">Post Comment</button>
                <button class="cancel-btn">Cancel</button>
                
              </div>
              
            </div>
  
              
            </form>           
          <div style="clear:both;"></div>
      </div>
    </div>
  
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>'; 
  ?>

          
        


          

<footer class="text-center">
  <h5>© EhtpReads<span class="orange"> .</span></h5>
</footer>

<script src="js/observers.js"></script>
  </body>
</html>
