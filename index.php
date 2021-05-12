<?php
session_start();
include 'database.php';





    if (isset($_POST['submit'])) 
    { 
      if($_POST['submit']=="Se connecter")
  { 
        $login = $_POST["name"];
        $password =$_POST["password"];
        $isSuccess = true; 
        

        if (empty($login))
        {
            $loginError = "Nom d'utilisateur ou email invalide !";
            $isSuccess = false; 
        } 

        if (empty($password))
        {
            $passError = "Mot de passe invalide";
            $isSuccess = false; 
        }

        
        if($isSuccess) 
        {
           
            $query = "SELECT * FROM utilisateur WHERE (login = '$login' OR email = '$login') AND motDePasse = '$password'";
            $result = mysqli_query($con,$query)or die(mysql_error());
            
            if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['login'];   
            }
            else
            {
              $isSuccess = false;
              $accountError = "Login ou mot de passe invalide !";                    
        }
        
        
    }
  }
    else if($_POST['submit']=="S'inscrire")
    {  
      $name = $_POST["name"];
      $email =$_POST["email"];
      $password = $_POST["password"];
      $repassword = $_POST["repassword"];
      $isSuccess = true; 
      

      if (empty($name))
      {
          $nameError = "Nom d'utilisateur invalide !";
          $isSuccess = false; 
      } 

      if(!isEmail($email)) 
      {
          $emailError = "Email invalide  !";
          $isSuccess = false; 
      } 

      if (empty($password))
      {
          $passError = "Mot de passe invalide";
          $isSuccess = false; 
      }

      if (empty($repassword) || $password !== $repassword)
      {
          $repassError = "Pas de correspondance !";
          $isSuccess = false; 
      }
      
      if($isSuccess) 
      {
         
          $query = "SELECT * FROM utilisateur WHERE login = '$login'OR email = '$email'";
          $result=mysqli_query($con,$query) or die(mysql_error);
          if(mysqli_num_rows($result)==0)
          {
              $query = "INSERT INTO utilisateur (login,motDePasse,email) values('$login', '$password', '$email')";
              $result=mysqli_query($con,$query);                 
          }
          else
          {
              $isSuccess = false;
              $nameError = "login ou email déjà utilisé";
              $emailError = "login ou email déjà utilisé";
          }
         
        }
      
      
      }



      
  }
  function isEmail($email) 
  {
      return filter_var($email, FILTER_VALIDATE_EMAIL);
      
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

    <style>
       #books .row{margin-top:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .book-block {margin-top:20px;margin-bottom:10px; padding:10px 10px 10px 10px; border :1px solid #DEEAEE;border-radius:10px;height:100%;}


li{

text-decoration:none;
--spacing: 1em;
color: inherit;
position: relative;
list-style: none;
margin: 0;
padding: 0;
display: flex;
align-items: center;
  vertical-align: middle;
     line-height:30px;
}
        .autocomplete {
  position: relative;
  display: inline-block;
}
.good {
  display: flex;
  align-items: center;
  vertical-align: middle;
     
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

      </style>
    
  </head>

  <body>
    <header>
      <a href="index.php" class="site-logo" aria-label="homepage" style="text-decoration: none; color: inherit;">EhtpReads<span class="orange"> .</span></a>
      
      <nav class="main-nav">
        <ul class="nav__list"  >
        <?php
     if(isset($_SESSION['user']))
     { 
     echo ' 
     <ul class="nav__list"  >
     <li class="nav__list-item"><a href="accueil.php" class="nav__link" style="text-decoration: none; color: inherit;">Accueil</a></li>
     <li class="nav__list-item">
       <a href="index.php" class="nav__link"  style="text-decoration: none; color: inherit;">Mon espace</a>
     </li>
     <li class="nav__list-item">
       <a href="biblio.php" class="nav__link" style="text-decoration: none; color: inherit;">Mes livres</a>
     </li>


   </ul>
      
      
     ';
     }
      else {
        
       echo '
       <ul  class="nav__list" style="float:left;margin-right:400px;">
       <li class="nav__list-item"><a href="index.php" class="nav__link" style="text-decoration: none; color: inherit;">Accueil</a></li>
   
       </ul>
      ';     
      }
?>
        </ul>
        
      </nav>
      <?php
      if(!isset($_SESSION['user']))
      { 
      echo '
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
      else{
        echo' 
        <nav class="account">
        <ul class="nav__list" >
        <li class="nav__list-item"> <span href="#" class="nav__link" style="text-decoration: none;color: inherit;font-size:large;">' .$_SESSION['user']. '</span></li>
        <li class="nav__list-item"> <a  class="nav__link nav__link--btn nav__link--btn--highlight" href="destroy.php"  
        style="text-decoration: none;" > Se déconnecter </a> </li>
        </ul>
      </nav>';                                
      }
      ?>
    </header>
    <main>
    <?php 
if(isset($_SESSION['user'])){
  echo'
      <section class="home-intro" id="about">
        <div class="container">
          <div class="row">
            <div class="col-12 ">
            <h1>Bienvenue <span style="color: #D4AF37;">'. $_SESSION['user'].' </span></h1>
            </div>
            
            
          </div>
        </div>
        
      
      </section>

<section class="hero-wrap js-fullheight"  style="margin-top: 100px;">
      <div class="overlay"></div>
      <div class="container-fluid px-0">
      	<div class="row slider-text align-items-center js-fullheight justify-content-end">
	      	<img class="one-third js-fullheight align-self-end order-md-last img-fluid" src="images/undraw_book_lover_mkck.svg" alt="">

	        	<div class="btns">
      
              <p><a href="insert.php" class="btn btn-primary py-3 px-4" style="width:170px;">Ajouter un livre</a></p>
              <p><a href="biblio.php" class="btn btn-primary py-3 px-4" style="width:170px;">Ma bibliothèque</a></p>
     
	          </div>
	        
	    	</div>
      </div> 
    </section>';
}else
{
  echo'
      <section class="home-intro" id="about">
        <div class="container">
          <div class="row">
            <div class="col-12 ">
            <h1><span style="color: #D4AF37;">EhtpReads</span> : La bibliothèque éléctronique de<br>l\'école Hassania des Travaux Publics</h1>
            </div>
            
            
          </div>
        </div>
        
       
      </section>';
}
?>

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

              <div class="col-xs-12 col-lg-4 style="padding-bottom: 20px;">

                <div class="col fade-in style="padding-bottom: 20px;">
                  <h3 style="text-transform: uppercase;">Apprendre</h3>
                  <p>
                    Découvrez les livres les plus pertinents au moindre effort.
                  </p>
                  
                </div>
              </div>


              </div>
              
            </div>
          </div>


          <section class="ftco-section ftco-project" id="projects-section" style="background: #f4f4f4;
          padding: 20px 0 40px;">
            <div class="container">

              <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h2 class="mb-4">Livres</h2>
                  <div class="divider"></div>
                </div>
              </div>
      
              <form autocomplete="off" role="search" method="POST" action="index.php" class="form-inline d-flex justify-content-center md-form form-sm mt-0"  style="margin-bottom: 20px;">
                <i class="fas fa-search" aria-hidden="true"></i>
                <div class="autocomplete" style=" position: relative;display: inline-block;">
                <input id="myInput" style="width:600px;height:50px;" name="keyword" type="text" placeholder="Chercher un livre"
                  aria-label="Search">
                 </div>
                <input style="height:50px;width:100px" type="submit" name="search" id="search" value="search"/>
                
              </form>
              <?php   
              $arr=array();
                    $query = "SELECT * FROM livre ";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                    if(mysqli_num_rows($result) > 0) 
                    {   
                        while($row = mysqli_fetch_assoc($result)) 
                        { $arr[]=$row['titre'];}}
                      
                   
                             
              ?>
            
<?php 
if(isset($_POST['search'])){
    $keyword=$_POST['keyword'];
$query="SELECT  * from livre inner join auteur on livre.idAuteur=auteur.idAuteur where isbn like '%{$keyword}%' OR nomlogin like '%{$keyword}%' OR titre like '%{$keyword}%' OR nom like '%{$keyword}%' OR genre like '%{$keyword}%'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));

    
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#00B9F5;text-transform:uppercase;"> found  '. mysqli_num_rows($result) .' records </h4>
           </div>
        </div>';
       
        if(mysqli_num_rows($result) > 0) 
        {   echo '<div class="row">';
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="images/" .$row['image']. "";
            $description="description.php?ID=".$row["isbn"];
         
            
            
            echo'
            <div class="col-md-3 fade-in">
                <a href="'.$description.'">
              
                
                        
                      <div class="project img ftco-animate d-flex justify-content-center align-items-end" style="background-image: url('.$path.');">
                            <div class="overlay"></div>
                        <div class="text p-4">
                          <h3>'.$row['titre'].'</h3>
                        </div>
                      </div>
                                   
                </a> 
            </div>';
            
            }
            echo '</div>';
            echo '<br> <br> <hr>';
        }
    
}

if(isset($_POST['genre']))
{
  $category=$_POST['genre'];
  if($_POST['genre']=="Romance")
  {  
    $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  where genre='Romance' 
    group by isbn order by averrage desc ";
      $result=mysqli_query($con,$query) or die(mysqli_error($con));
      ?>
         <script type="text/javascript">
            document.getElementById('genre').Selected=$_POST['genre'];
         </script>
      <?php
  }
else
if($_POST['genre']=="Horror")
  {   $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  where genre='Horror' 
    group by isbn order by averrage desc ";
      $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }
else
if($_POST['genre']=="fantasia")
  {    $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  where genre='fantasia' 
    group by isbn order by averrage desc ";
      $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }
else
if($_POST['genre']=="adventure")
  {  $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  where genre='adventure' 
    group by isbn order by averrage desc ";
      $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }
else
if($_POST['genre']=="drama")
  {    $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  where genre='drama' 
    group by isbn order by averrage desc ";
      $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }
else
if($_POST['genre']=="sci-fiction")
  {  $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  where genre='sci-fiction' 
  group by isbn order by averrage desc ";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
  }
}
else {     $query="SELECT *, max(averrage) FROM livre join affiche_rate on livre.isbn=affiche_rate.idisbn  
group by isbn order by averrage desc ";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
          $category="tout";
}

$i=0;
echo '<div class="container-fluid" id="books">
<div class="row">
  <div class="col-xs-12 text-center" id="heading" style="text-align:center;">
         <h2 style="color:rgb(228, 55, 25);text-transform:uppercase;margin-bottom:0px;float:left;margin-left:0px;"> GENRE:  '. $category .' </h2>
   </div>
</div>      
<div class="container fluid">
     <div class="row">
          <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
               <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                   
                 <select id="genre" name="genre" class="form-control" onchange="form.submit()" style="margin-left:200px;width:250px;">
                   <option selected disabled>Sélectionner un genre </option>
                   <option value="Romance">Romance</option>
                   <option value="Horror">Horror</option>
                   <option value="sci-fiction">sci-fiction</option>
                   <option value="drama">drama</option>
                   <option value="fantasia">fantasia</option>
                   <option value="adventure">adventure</option>
                   </select>
               </form>
          </div>
      </div>
</div>';


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
                  <h3><a href="'.$description.'">'.$row['titre'].'</a></h3>
              
                    <span> posté par : '.$row['nomlogin'].'</span><hr>
                    <span> Note : '.$row['averrage'].' /5 </span>
                  </div>
                </div>
                             
          </a> 
      </div>';
    }
    if(isset($_POST['genre']))
    {
    $category=$_POST['genre'];
    if($_POST['genre']=="Romance")
            {  
              $query="SELECT * from livre 
              WHERE isbn not in
              (SELECT idisbn from affiche_rate) 
             and  genre='Romance' ";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                ?>
                   <script type="text/javascript">
                      document.getElementById('genre').Selected=$_POST['genre'];
                   </script>
                <?php
            }
    else
    if($_POST['genre']=="Horror")
            {      $query="SELECT * from livre 
              WHERE isbn not in
              (SELECT idisbn from affiche_rate) 
             and  genre='Horror' ";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            }
    else
    if($_POST['genre']=="fantasia")
            {      $query="SELECT * from livre 
              WHERE isbn not in
              (SELECT idisbn from affiche_rate) 
             and  genre='fantasia' ";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            }
    else
    if($_POST['genre']=="adventure")
            {     $query="SELECT * from livre 
              WHERE isbn not in
              (SELECT idisbn from affiche_rate) 
             and  genre='adventure' ";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            }
    else
    if($_POST['genre']=="drama")
            {     $query="SELECT * from livre 
              WHERE isbn not in
              (SELECT idisbn from affiche_rate) 
             and  genre='drama' ";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            }
    else
    if($_POST['genre']=="sci-fiction")
            {   $query="SELECT * from livre 
              WHERE isbn not in
              (SELECT idisbn from affiche_rate) 
             and   genre='sci-fiction' ";
                  $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            }
     }
      else {     $query="SELECT * from livre 
        WHERE isbn not in
        (SELECT idisbn from affiche_rate) 
       ";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                    $category="tout";
      }


    


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
              <h3><a href="'.$description.'">'.$row['titre'].'</a></h3>
          
                
                <span> Note: aucune  </span>
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


          <section id="authors">
            <div class="row no-gutters justify-content-center pb-5">
              <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Auteurs populaires</h2>
                <div class="divider"></div>
              </div>
            </div>
            <div class="container">
              <div class="row">



              <?php 
        
        $query="SELECT *,count(idAuteur) from auteur group by nom order by count(idAuteur) desc ";
        $result = mysqli_query ($con,$query)or die(mysqli_error($con));
        while($row = mysqli_fetch_assoc($result)) 
{ 
  $desauteur="auteur.php?ID=".$row["idAuteur"];
  echo '
  <div class="col-md-3 card-container fade-in">

  <div class="image-container">
    <img src="images/person_1.jpg" />
  </div>

<div class="lower-container">
  <div>
    <p class="name" style="text-transform: uppercase;">'.$row['nom'].'</p>
    
  </div>

  <div style="margin-top: 20px;>
    <a href="'.$desauteur.'" class="btn">Voir le profil</a>
  </div>
</div>
</div>  
            ';
}
        ?>


            
              </div>
            </div>

              
          </section>


          <section id="recommandations">
            <div class="container">
              <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                  <h2 class="mb-4">Meilleurs citations</h2>
                  <div class="divider"></div>
                </div>
              </div>
                <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
                    <ol class="carousel-indicators">
                         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                         <li data-target="#myCarousel" data-slide-to="1"></li>
                         <li data-target="#myCarousel" data-slide-to="2"></li>  
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <h3>"A room without books is like a body without a soul."</h3>
                            <h4>Cicero</h4>       
                        </div>
                          <div class="carousel-item">
                            <h3>"The library is inhabited by spirits that come out of the pages at night."</h3>
                            <h4>Isabel Allende</h4>       
                        </div>
                          <div class="carousel-item">
                            <h3>"If you don’t like to read, you haven’t found the right book."</h3>
                            <h4>J.K. Rowling</h4>       
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev" role="button">
                        <span class="fas fa-chevron-left fa-2x"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next" role="button">
                        <span class="fas fa-chevron-right fa-2x"></span>
                    </a>
                
                </div>
            
            </div>
        
        
        </section>


<?php 
$arrimage=array();
$query="SELECT * from livre";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
  while($row=mysqli_fetch_assoc($result))  
      {$path="images/".$row['image']."";
        $arrimage[]=$path;
      }
?>
<footer class="text-center">
  <h5>© EhtpReads<span class="orange"> .</span></h5>
</footer>
<script>
  function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
b.className='good';
          li=document.createElement("li");
          /*make the matching letters bold:*/
          p=document.createElement("p");
         
          
          p.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          p.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          p.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          
          var iconurl =  <?php echo json_encode($arrimage); ?>;
          var img = document.createElement("img"); 
            img.src=iconurl[i];
            img.width=50;
             img.height=50;
             li.appendChild(img);
             li.appendChild(p);
             b.appendChild(li);
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  </script>
<script type="text/javascript">   
var myvar = <?php echo json_encode($arr); ?>;
autocomplete(document.getElementById("myInput"), myvar);
</script>
<script src="js/observers.js"></script>
  </body>
</html>
