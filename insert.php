<?php

    session_start();
     
    require 'database.php';
 
    $titleError = $dateError = $genreError  = $imageError = $nameError = $desLivreError = $desAuteurError = $statutError = $birthError = $ratingError = "";
    $title = $date = $genre = $image = $name = $descriptionLivre = $descriptionAuteur = $statut = $birth = $rating = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $descriptionLivre   = checkInput($_POST['desLivre']);
        $descriptionAuteur  = checkInput($_POST['desAuteur']);
        $statut             = checkInput($_POST['statut']);
        $genre              = checkInput($_POST['genre']);
        $title              = checkInput($_POST['title']); 
        $date               = checkInput($_POST['date']); 
        $birth              = checkInput($_POST['birth']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $rating             = !empty($_POST['rating']) ? $_POST['rating'] : NULL;
        $imagePath          = './images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($descriptionAuteur)) 
        {
            $desAuteurError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($descriptionLivre)) 
        {
            $desLivreError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($statut)) 
        {
            $statutError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($genre)) 
        {
            $genreError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($date)) 
        {
            $dateError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($birth)) 
        {
            $birthError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($title)) 
        {
            $titleError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($image)) 
        {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($rating)) 
        {
            $ratingError = 'Vous devez évaluer ce livre';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            
            if(isset($_SESSION['user']))
            {  $nom=$_SESSION['user'];
            
            $query = "INSERT INTO auteur (nom,dateDeNaissance,bio) values('$name','$birth', '$descriptionAuteur')";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));

            $query = "INSERT INTO livre (idAuteur,nomlogin,titre,dateDeCreation,genre,image,description) values(LAST_INSERT_ID(),'$nom', '$title','$date', '$genre', '$image','$descriptionLivre')";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            $idLivre =  mysqli_insert_id($con);
       
         
           $query="INSERT INTO biblio (user,numisbn) values('$nom', LAST_INSERT_ID())";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));

            $query = "INSERT INTO rating (numbook,php,rater)  VALUES('$idLivre','$rating', ".$_SESSION['id_user'].")";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
           

            $query = "INSERT INTO post (idCreateur,idLivre,contenu,dateCreation)  VALUES(".$_SESSION['id_user'].",'$idLivre', '$statut', now())";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
           
            print'
                <script type="text/javascript">alert("livre ajouté avec succès!!!");</script>
                  ';
        }
    }
    }

    function checkInput($data) 
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un livre</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
            <div class="row">

                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="insert.php" role="form" enctype="multipart/form-data">
                        <h2 class="form-title" style="font-family: 'Raleway'; font-weight : bold; ">Ajouter un Livre</h2>
                        <br>
                            <div class="col-sm-6">
                            <h3 style="padding-top: 10px; font-family: 'Raleway'; font-weight : bold; ">Informations du livre</h3><br>
            
                            
                                <div class="form-group">
                                    <input type="text" class="form-input" name="title" required id="title" placeholder="Titre" value="<?php echo $title;?>"/>
                                    <span class="help-inline"><?php echo $titleError;?></span>
                                </div>
                                <div class="form-group">
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-input" name="date" required id="date" placeholder="Date de publication" value="<?php echo $date;?>"/>
                                    <span class="help-inline"><?php echo $dateError;?></span>
                                </div>
                                <div class="form-group">
                                <select id="genre" name="genre" class='form-control' required>
                                    <option selected disabled>Sélectionner un genre </option>
                                    <option value="romance">Romance</option>
                                    <option value="Horror">Horror</option>
                                    <option value="sci-fiction">sci-fiction</option>
                                    <option value="drama">drama</option>
                                    <option value="fantasia">fantasia</option>
                                    <option value="fantasia">adventure</option>
                                </select>
                                <span class="help-inline"><?php echo $genreError;?></span>

                                </div>
                                <div class="form-group">
                                    <textarea  class="form-input" name="desLivre" required id="desLivre" placeholder="Saisir une brève description du livre ?" rows="4" value="<?php echo $descriptionLivre;?>"></textarea>
                                    <span class="help-inline"><?php echo $desLivreError;?></span>
                                </div>


                                
                            </div>

                            <div class="col-sm-6">
                            <h3 style="padding-top: 10px; font-family: 'Raleway'; font-weight : bold; ">Informations de l'auteur</h3><br>
                                <div class="form-group">
                                    <input type="text" class="form-input" name="name" required id="name" placeholder="Nom d'auteur" value="<?php echo $name; ?>"/>
                                    <span class="help-inline"><?php echo $nameError;?></span>
                                </div>
                                    <div class="form-group">
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" class="form-input" name="birth" required id="birth" placeholder="Date de naissance" value="<?php echo $birth; ?>"/>
                                    <span class="help-inline"><?php echo $birthError;?></span>
                                </div>
                                <div class="form-group">
                                    <textarea  class="form-input" name="desAuteur" required id="desAuteur" placeholder="biographie de l'auteur" rows="5" value="<?php echo $descriptionAuteur;?>"></textarea>
                                    <span class="help-inline"><?php echo $desAuteurError;?></span>
                                </div>

                            </div>

                            <div class="col-sm-12">
                            <h3 style="padding-top: 10px; font-family: 'Raleway'; font-weight : bold; ">Votre post</h3><br>
                                
                                <div class="form-group">
                                    <textarea  class="form-input" name="statut" required id="statut" placeholder="Que pensez-vous du livre ?" rows="4" value="<?php echo $statut;?>"></textarea>
                                    <span class="help-inline"><?php echo $statutError;?></span>
                                </div>

                                <div class="form-group"> 
                                     <div class="col-md-3" style="padding-top: 10px; font-family: 'Raleway'; font-weight : bold; ">Évaluez ce livre :</div>
                                    <div class="rating ">
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="J'adore">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="J'aime bien">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="J'aime">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Je n'aime pas">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Je déteste">1 star</label>
                                    </div>
                                    <span class="help-inline"><?php echo $ratingError;?></span>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="image" style="padding-top: 10px; font-family: 'Raleway'; font-weight : bold; ">Couverture du livre:</label>
                                    <input type="file" id="image" name="image"> 
                                    <span class="help-inline"><?php echo $imageError;?></span>
                                </div>

                            </div>

                            <div class="form-actions col-md-12">
                                
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                             </div>
                            <span class="help-inline"><?php echo $nameError;?></span>
                            
                        
                    </form>
                    

                </div>                  
                
            </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>