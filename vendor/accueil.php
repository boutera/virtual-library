<?php 
    session_start();
    $db = mysqli_connect("localhost", "root", "", "ehtpreads");
    include ('functions.php');
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
    <script src="js/posts.js"></script>
    
  </head>

  <body>
    <header>
      <a href="#" class="site-logo" aria-label="homepage" style="text-decoration: none; color: inherit;">EhtpReads<span class="orange"> .</span></a>
      
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
        <?php echo '<li class="nav__list-item"> <span href="#" class="nav__link" style="text-decoration: none;color: inherit;font-size:large;"> ' .$_SESSION['user']. '</span></li>'; ?>
        <li class="nav__list-item">
            <a
              class="nav__link nav__link--btn nav__link--btn--highlight"
              href="destroy.php"  style="text-decoration: none;"
              >Se déconnecter</a
            >
          </li>
          
        </ul>
      </nav>
      
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

      <div class="home-about">
        <div class="container">
          <div class="row">

            
              <div class="col-xs-12 col-lg-4">

                <div class="col fade-in" style="padding-bottom: 20px;">
                  <h3 style="text-transform: uppercase;">échanger</h3>
                  <p>
                    Rédiger vos avis, évaluer les livres et améliorer l'échange!
                  </p>
                </div>

              </div>
              <div class="col-xs-12 col-lg-4">

                <div class="col fade-in" style="padding-bottom: 20px;">
                  <h3 style="text-transform: uppercase;">Recommander</h3>
                  <p>
                    Encouragez vos amis à lire les meilleurs livres.
                  </p>
                </div>
              </div>

              <div class="col-xs-12 col-lg-4" style="padding-bottom: 20px;">

                <div class="col fade-in" style="padding-bottom: 20px;">
                  <h3 style="text-transform: uppercase;">Apprendre</h3>
                  <p>
                    Découvrez les livres les plus pertinents au moindre effort.
                  </p>
                  
                </div>
              </div>


              </div>
              
            </div>
          </div>


          <?php 
          
        
        $statement = mysqli_query($db, "SELECT * FROM post  ORDER BY idPost DESC");
        
        while($item = mysqli_fetch_assoc($statement)) {

          echo '<div class="grey-bar"></div>';
          echo '<div class="add-comment-text">
          <div class="main-section">
            <div class="content">
              <div class="top-section">
                <div class="user-img">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/OOjs_UI_icon_userAvatar.svg">
                </div>';
    
            echo '<div class="user-detail">';
            echo '<p>'.getUserNameById($item['idCreateur']).'</p>';
            echo '<p style="float: right;">'.stars(getRatingById($item['idCreateur'],$item['idLivre'])).' </p>';
            echo '<span>  Shared - '.date('M', strtotime($item['dateCreation'])).'  '.date('j', strtotime($item['dateCreation'])).' , '.date('Y', strtotime($item['dateCreation'])).' at  '.date('H', strtotime($item['dateCreation'])).':'.date('i', strtotime($item['dateCreation'])).'</span>';
            echo '</div>
            <div style="clear:both;"></div>			
            <div class="comment-content">';
            echo '<span>'.$item['contenu'].'.</span></div><br>';
            
            echo '<div class="row">
            <div class="col-md-4 fade-in">';
             echo' <div class="project img ftco-animate d-flex justify-content-center align-items-end" style="background-image: url(images/'.getImageByBookId($item['idLivre']).');">';
             echo'   <div class="overlay"></div>
                <div class="text p-4">';
            echo'      <h3><a href="description.php?ID='.$item['idLivre'].'">'.getBookTitleById($item['idLivre']).'</a></h3>';
             echo'     <span>'.getGenreById($item['idLivre']).'</span>';
              echo'  </div>
              </div>
            </div>
            </div>
            <div class="count-btn">';
                  echo '<button class="btn">'.getCommentCountByPostId($item['idPost']).' comments</button>';
               echo' </div>
                <div class="enter-btn">
                  <button class="btn"><i class="fas fa-eye"></i></button>
                </div>
                <div style="clear:both;"></div>';

                if(isset($_GET['COMMENT']))
                $com=$_GET['COMMENT'];
                else $com=0;
                if(isset($_GET['POST']))
                $post=$_GET['POST'];
                else $post=-1;
               if($item['idPost']==$post)
            $statement2 = mysqli_query($db, "SELECT * FROM post_comments WHERE idPost = ".$item['idPost']." LIMIT $com, 3");
            else 
            $statement2 = mysqli_query($db, "SELECT * FROM post_comments WHERE idPost = ".$item['idPost']." LIMIT 3");
if(isset($_GET['COMMENT']) && $item['idPost']==$post)
 $i=$_GET['COMMENT'];
 else $i=0;
          echo '<div class="sub-comment">';
          while($comment = mysqli_fetch_assoc($statement2)) {

            echo '<div class="example">
                    <div class="comment-img"><img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" class="example"></div>
                    <div class="comment">';
       
            echo '<div class="user-detail">';
            echo '<p>'.getUserNameById($comment['idUtilisateur']).'</p>';
            echo '<span style="float : right; margin-top: 27px;">'.stars(getRatingById($comment['idUtilisateur'],$item['idLivre'])).''.date('M', strtotime($comment['dateCreation'])).'  '.date('j', strtotime($comment['dateCreation'])).' , '.date('Y', strtotime($comment['dateCreation'])).' at  '.date('H', strtotime($comment['dateCreation'])).':'.date('i', strtotime($comment['dateCreation'])).'</span>';
            echo '</div>';
            echo'            <p style="margin-top: 0px;">'.$comment['contenu'].'</p> ';
            echo'        </div>
                    <div style="clear:both;"></div>
                  </div>';
                  $i++;
                  $target="accueil.php?COMMENT=".$i."&POST=".$comment['idPost']."";
                  if($i%3==0) 
                  {
         
                  echo '<a href="'.$target.'"  >see more</a>';
             
                  
                  }
                  
              

          }



          echo '</div>';
          
          
         echo ' <div class="comment-box box">              
                <div class="comment-btn">
                  <input type="textarea" class="text" rows="10" cols="30" placeholder="Donner un avis...">
                </div>
              </div>
      </div>
    <div class="add-comment">
        <div class="box">
          <div class="add-comment-img">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png">
          </div>
          <div class="add-comment-text">';

          echo '<form method="POST"  class="comment-form" action="accueil.php"   Enctype ="multipart/form-data;">';
          echo '<input type="hidden" name="idPost" value="'.$item['idPost'].'" />';
          echo'    <div class="form-group">
                <textarea rows="5" class="example-textarea" name="comment" required  placeholder="Ajouter un commentaire"></textarea><br>
                
              </div>

              <div class="form-actions">
                  
                <button type="submit" class="post-comment-btn"  >Post Comment</button>
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
            
        }
    
        ?>
        


          

<footer class="text-center">
  <h5>© EhtpReads<span class="orange"> .</span></h5>
</footer>

<script src="js/observers.js"></script>
  </body>
</html>
