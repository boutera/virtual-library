<?php
session_start();
if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
	include "database.php";
         $customer=$_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
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
        </style>
    
    </head>
  
    <body>
      <header>
      <a href="index.php" class="site-logo" aria-label="homepage" style="text-decoration: none; color: inherit;">EhtpReads<span class="orange"> .</span></a>
      <?php 
      if(isset($_SESSION['user'])){
       echo'
      <nav class="main-nav">
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
        <li class="nav__list-item"> <span href="#" class="nav__link" style="text-decoration: none;color: inherit;font-size:large;">' .$_SESSION['user']. '</span></li>
        <li class="nav__list-item"> <a  class="nav__link nav__link--btn nav__link--btn--highlight" href="destroy.php"  
        style="text-decoration: none;" > Se déconnecter </a> </li>
        </ul>
      </nav> ';}
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
    </nav>';
      }
      echo '</header>';



?>
<section class="home-intro" id="about">            </section>
         
         <section class="ftco-section ftco-project" id="projects-section" style="background: white;
             padding: 20px 0 40px;">
               <div class="container">
               <div class="row no-gutters justify-content-center pb-5">
                   <div class="col-md-12 heading-section text-center ftco-animate">
                     <h2 class="mb-4">Profil de l'auteur</h2>
                     <div class="divider"></div>
                   </div>
                 </div>
<?php

$auteur=$_GET['ID'];
  $query="SELECT * from auteur where idAuteur='$auteur'";
  $result = mysqli_query ($con,$query)or die(mysqli_error($con));
  $row=mysqli_fetch_assoc($result);
  $nom=$row['nom'];

echo '<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="author-section" style="margin-top: 40px">
<div class="container">
        <div class="row justify-content-start pb-3">
          <div class="col-md-12 heading-section ftco-animate">';
          echo '  <h3 class="mb-4" style="text-transform: uppercase;">'.$nom.'</h3> ';
           echo' <p>'.$row['bio'].'</p>
            <ul class="about-info mt-4 px-md-0 px-2">
              <li class=""><span >Date de naissance :</span> <span style="padding-left: 10px;">'.$row['dateDeNaissance'].'</span></li>
              
              
            </ul>
          </div>

</div>
</div>
</div>
</section>';

?>

      
         
      <section class="ftco-section ftco-project" id="projects-section" style="background: #f4f4f4;
          padding: 20px 0 40px;">
            <div class="container">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h2 class="mb-4">Ses livres</h2>
                  <div class="divider"></div>
                </div>
              </div>

              
              
       
<?php 


          $query="SELECT * FROM livre join auteur on livre.idAuteur=auteur.idAuteur
           where auteur.nom='$nom'
           ";
         
      
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                    echo '<div class="row">';
                   
                    
                    while($row = mysqli_fetch_assoc($result)) 
                    { 
                      $path="images/" .$row['image']."";
                      $description="description.php?ID=".$row["isbn"];
                      
                    
                      echo'
                      <div class="col-md-3 fade-in">
                          <a href="'.$description.'">
                        
                          
                                  
                                <div class="project img ftco-animate d-flex justify-content-center align-items-end" style="background-image: url('.$path.');">
                                      <div class="overlay"></div>
                                
                                  <div class="text p-4">
                                  <h3>'.$row['titre'].'</h3><br><hr><hr><hr><hr>
                              
                                    <span>POSTED BY: '.$row['nomlogin'].'</span><hr>
                                   
                                  </div>
                                </div>
                                             
                          </a> 
                      </div>';
                    }


                    
                        echo '</div>';
                        echo '<br> <br> <hr>';

                    

                      
                

                    ?>
                    
            </div>
            </section>
            <footer class="text-center">
  <h5>© EhtpReads<span class="orange"> .</span></h5>
</footer>
            <script src="js/observers.js"></script>
  </body>
</html>