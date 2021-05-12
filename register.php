<?php 
     if(empty($_SESSION)) 
     {
         session_start();
     }

   require 'database.php';
   $name = $email = $password = $repassword = $nameError = $emailError = $passError = $repassError = "";
   $isSuccess = false;
   if (isset($_POST['submit'])) 
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
       
        $query = "SELECT * FROM utilisateur WHERE login = '$name' OR email = '$email'";
        $result=mysqli_query($con,$query) or die(mysql_error);
        if(mysqli_num_rows($result)==0)
        {
            $query = "INSERT INTO utilisateur (login,motDePasse,email) values('$name', '$password', '$email')";
            $result=mysqli_query($con,$query);
          
            print'
            <script type="text/javascript">
             alert("Successfully Registered!!!");
            </script>
           '; 
           header("Location: index.php?Message=successfully registered!!");    
        

                   
        }
        else
        {
            $isSuccess = false;
            $nameError = "login ou email déjà utilisé";
            $emailError = "login ou email déjà utilisé";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,900&display=swap"
      rel="stylesheet"
    />
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="register.php">
                        <h2 class="form-title">Créer un compte</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" required id="name" placeholder="Nom d'utilisateur" value="<?php echo $name; ?>"/>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" required id="email" placeholder="Email" value="<?php echo $email; ?>"/>
                            <span class="help-inline"><?php echo $emailError;?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" required id="password" placeholder="Mot de passe" value="<?php echo $password; ?>"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <span class="help-inline"><?php echo $passError;?></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="repassword" required id="repassword" placeholder="Confirme le mot de passe" value="<?php echo $repassword; ?>"/>
                            <span class="help-inline"><?php echo $repassError;?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="S'inscrire" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Vous avez déjà un compte ? <a href="../sign-up-in/login.php" class="loginhere-link" >Se connecter</a>
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