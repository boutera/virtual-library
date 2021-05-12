<?php 
    session_start();
    $db = mysqli_connect("localhost", "root", "", "ehtpreads");
    
    
    include ('functions.php');
    $idComment=$_GET['comment'];
    $idLivre=$_GET['idLivre'];

    $isSuccess = false;


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $reply = test_input($_POST["reply"]);
       
  
        $isSuccess = true; 
        
        
        if($isSuccess) 
        {
            $result = mysqli_query($db, "INSERT INTO post_reply (contenu,idUtilisateur,dateCreation,idParent) values('$reply',".$_SESSION['id_user'].",now(), '$idComment' )");

        }
        
        
    }


    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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
    <link rel="stylesheet" type="text/css" href="css/posts.css" />
    <script src="js/posts.js"></script>
    
    
        <style>
       #books .row{margin-top:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .book-block {margin-top:20px;margin-bottom:10px; padding:10px 10px 10px 10px; border :1px solid #DEEAEE;border-radius:10px;height:100%;}
        </style>
    

    </head>
  
    <body>
    <header>
      <a href="index.php" class="site-logo" aria-label="homepage" style="text-decoration: none; color: inherit;">EhtpReads<span class="orange"> .</span></a>
      
      <nav class="main-nav">
        <ul class="nav__list"  >
          <li class="nav__list-item"><a href="accueil.php" class="nav__link" style="text-decoration: none; color: inherit;">Accueil</a></li>
          <li class="nav__list-item">
            <a href="index.php" class="nav__link"  style="text-decoration: none; color: inherit;">Mon espace</a>
          </li>
          <li class="nav__list-item">
            <a href="#" class="nav__link" style="text-decoration: none; color: inherit;">Groupes</a>
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
    <section class="home-intro" id="about">
        <div  class="container">
          <div class="row">
            <div class="col-md-12 ">
              <h1><span style="color: #D4AF37;">EhtpReads</span> : La bibliothèque éléctronique de<br>l'école Hassania des Travaux Publics</h1>
            </div>
            
            
          </div>
        </div>
      </section>
      <?php 
    
      ?>
      <section class="ftco-section ftco-project" id="projects-section" style="background: white;
          padding: 20px 0 40px;">
            <div class="container">

              <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h2 class="mb-4">discussions</h2>
                  <div class="divider"></div>
                </div>
              </div>
      
              
             <?php
     
             echo '<div   class="sub-comment">';
             $statement2 = mysqli_query($db, "SELECT * FROM book_comments WHERE idComment= '$idComment' ");
             $comment=mysqli_fetch_assoc($statement2);
             $id=$comment['idUtilisateur'];
           
             echo '<div  class="example">
             <div  class="comment-img"><img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" class="example"></div>
             <div  class="comment">';

     echo '<div  class="user-detail">';
     echo '<p>'.getUserNameById($comment['idUtilisateur']).'</p>';
     echo '<span style="float : right; margin-top: 27px;">'.stars(getRatingById($comment['idUtilisateur'],$idLivre)).'</span>';
     echo ' <span>        '.date('M', strtotime($comment['dateCreation'])).'  '.date('j', strtotime($comment['dateCreation'])).' , '.date('Y', strtotime($comment['dateCreation'])).' at  '.date('H', strtotime($comment['dateCreation'])).':'.date('i', strtotime($comment['dateCreation'])).'</span>';

     echo '</div>';
     echo'            <p style="margin-top: 0px;">'.$comment['contenu'].'</p> ';
     echo'        </div>
             <div style="clear:both;"></div>';

          echo '</div>';

          echo' 
          <div  style="float:left;margin-left:200px;" class="count-btn">';
                echo '<button class="btn">'.getReplyCountByIdComment($idComment).' réponses</button>';
             echo' </div>
         <br>
              <div style="clear:both;"></div>
              <br>';



          echo '<div  class="grey-bar"></div>';
          echo '<div  class="add-comment-text">
          <div style="width:66%;height:auto;" class="main-section">
            <div class="content">
              <div class="top-section">
               ';
    
                
            $statement2 = mysqli_query($db, "SELECT * FROM post_reply WHERE idParent=$idComment order by dateCreation ");
            if(isset($_GET['id']) && isset($_GET['idsource']))
            {
            $last_id=getLastId();
            $result = mysqli_query($db, "SELECT *  from reply_object where idsource=".$_GET['idsource']." AND idutilisateur=".$_GET['id']."");
            $total=mysqli_num_rows($result);
            if($total==0)
            
            $result = mysqli_query($db, "INSERT INTO reply_object (idreply,idutilisateur,idsource) values('$last_id' ,".$_GET['id'].",".$_GET['idsource'].")");   
            }

            else $last_id=-1;

           
          echo '<div   class="sub-comment">';
          while($comment = mysqli_fetch_assoc($statement2)) { 
    
          
           

            $path="discussion.php?comment=".$idComment."&idLivre=".$idLivre."&id=".$comment['idUtilisateur']."&idsource=".$comment['idReply']."#text";
            echo '<div  class="example">
                    <div  class="comment-img"><img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" class="example"></div>
                    <div  class="comment">';
       
            echo '<div  style="height:auto;width:auto;" class="user-detail">';
            echo '<p>'.getUserNameById($comment['idUtilisateur']).'</p>';
            echo '<span style="float : right; margin-top: 27px;marging-right:20px;height:auto;">'.stars(getRatingById($comment['idUtilisateur'],$idLivre)).'</span>
            <a  href="'.$path.'">répondre</a>';?>&nbsp;&nbsp;&nbsp;<?php 
           echo '<span style="float : right; margin-top: 27px;"> '.date('M', strtotime($comment['dateCreation'])).'  '.date('j', strtotime($comment['dateCreation'])).' , '.date('Y', strtotime($comment['dateCreation'])).' at  '.date('H', strtotime($comment['dateCreation'])).':'.date('i', strtotime($comment['dateCreation'])).'</span>';
         
            echo '</div>';
            if(iscontain($comment['idReply']))
            {
              $idUtilisateur=getUserNameById(getUtilisateurIdById($comment['idReply']));
        
               } 
               else
               $idUtilisateur="";
               echo'            <p style="margin-top: 0px;width:auto;height:auto"><b>'.$idUtilisateur.'</b> '.$comment['contenu'].'</p> ';
          

                 echo'        </div>
                    <div style="clear:both;"></div>
                  </div>';


          }



          echo '</div>';
          
          
         echo ' <div class="comment-box box">              
                <div class="comment-btn">
                  <input id="text" type="textarea" class="text" rows="10" cols="30" placeholder="répondre à ce commentaire" autofocus>
                </div>
           
              </div>
      </div>
    <div class="add-comment">
        <div class="box">
          <div class="add-comment-img">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png">
          </div>
          <div  class="add-comment-text">';

          echo '<form method="POST"  class="comment-form" action="discussion.php"   Enctype ="multipart/form-data;">';
          echo '<input type="hidden" name="idParent" value="'.$idComment.'" />';
          echo'    <div class="form-group">
                <textarea rows="5" class="example-textarea" name="reply" required  placeholder="répondre ici.." autofocus></textarea><br>
                
              </div>

              <div class="form-actions">
                  
                <button style="cursor:pointer;" type="submit"  class="post-comment-btn"  >répondre</button>
                <button class="cancel-btn">annuler</button>
                
              </div>
              
            </div>
  
              
            </form>           
          <div style="clear:both;"></div>
      </div>
    </div>

    </div>
    </div>
  
';

             ?>


<br>
<br><br><br><br><br><br><br><br>


    </p>
    <br><br><br>
                    
            </div>
            </section>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <footer class="text-center">
  <h5>© EhtpReads<span class="orange"> .</span></h5>
</footer>
            <script src="js/observers.js"></script>
  </body>
</html>