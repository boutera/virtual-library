<?php
 require 'database.php';
 if(empty($_SESSION)) 
		{
			session_start();
		}
    $login = $password = $loginError =  $passError = $accountError= "";
    $isSuccess = false;


    if (isset($_POST['submit'])) 
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
             $_SESSION['id_user']=$row['idUtilisateur'];
            
             
               header("Location: index.php");
            }
            else
            {
              $isSuccess = false;
              $accountError = "Login ou mot de passe invalide !";                    
        }
        
    }
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="login.php">
                        <h2 class="form-title">Se connecter</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Nom d'utilisateur ou Email" value="<?php echo $login; ?>"/>
                            <span class="help-inline"><?php echo $loginError;?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Mot de passe" value="<?php echo $password; ?>"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <span class="help-inline"><?php echo $passError;?></span>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Se connecter"/>
                            <span class="help-inline"><?php echo $accountError;?></span>
                        </div>
                    </form>
                    <p class="loginhere">
                    Vous n'êtes pas encore inscrit  ? <a href="register.php" class="loginhere-link" >S'inscrire</a> 
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>