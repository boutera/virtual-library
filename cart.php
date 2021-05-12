<?php
	session_start();
  if(!isset($_SESSION['user']))
       header("location: index.php");
	include "database.php";
         $customer=$_SESSION['user'];
?>
<?php



        if(isset($_GET['place']))
                 {  
                    $query="DELETE FROM cart where Customer='$customer'";
                    $result=mysqli_query($con,$query);
                 ?>
                    
                 <?php                  
                  }
        if(isset($_GET['remove']))
                 {  $product=$_GET['remove'];
                    $query="DELETE FROM cart where Customer='$customer' AND Product='$product'";
                    $result=mysqli_query($con,$query);
                 ?>
                    <script type="text/javascript">
                         alert("Item Successfully Removed");
                    </script>
                 <?php                  
                  }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta name="author" content="Shivangi Gupta">
    <title>favourites</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        #cart {margin-top:30px;margin-bottom:30px;}
        .panel {border:1px solid green;padding-left:0px;padding-right:0px;}
        .panel-heading {background:green !important;color:white !important;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}
    </style>

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
         	 </button>
              <a class="navbar-brand" href="index.php"><span style="color:#22d64f;width: 118px;margin-top: -7px;margin-left: -10px;">Accueil</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
	        <?php
	        if(isset($_SESSION['user'])) 
                echo'  <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['user']. '</a></li>
                 <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>
                ';
	        ?>

        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div id="top" >
      <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
          <div>
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
              </form>
          </div>
      </div>


	<?php

echo '<div class="container-fluid" id="cart">
      <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:#D67B22;text-transform:uppercase;"> Favourite books</h2>
           </div>
        </div>';
	if(isset($_SESSION['user']))
	    {   
              	if(isset($_GET['ID']))
	            {   
                        $product=$_GET['ID'];                       
                        $query="SELECT * from cart where Customer='$customer' AND Product='$product'";
                        $result=mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result)==0)
	                         { $query="INSERT INTO cart values('$customer', '$product')"; 
                              $result=mysqli_query($con,$query);
                            }
                       
                    }
              	$query="SELECT * FROM cart INNER JOIN livre ON cart.Product=livre.isbn
              	        WHERE Customer='$customer'";
	        $result=mysqli_query($con,$query); 
              $total= mysqli_num_rows($result);
              echo '<h2> Total books: '.$total.' </h2> <br>';
                if(mysqli_num_rows($result)>0)
                {    $i=1;
                     $j=0;
                     while($row = mysqli_fetch_assoc($result))
                     {       $path = "images/".$row['image']."";
                             
                             if($i % 2 == 1)  $offset= 1;
                             if($i % 2 == 0)  $offset= 2;                                                
                             if($j%2==0)
                                
                                 echo '<div class="row" >'; 
                                 echo '            
                                      <div class="panel col-xs-12 col-sm-4 col-sm-offset-'.$offset.' col-md-4 col-md-offset-'.$offset.' col-lg-4 col-lg-offset-'.$offset.' text-center" style="color:#D67B22;font-weight:800;">
                                          <div class="panel-heading">book '. $i .'
                                          </div>
                                          <div class="panel-body" >
			                                                <img class="image-responsive block-center" src="'.$path.'" style="height :100px;"> <br>
           							                                               Titre : '.$row['titre'].'  <br> 
                                                                        isbn : '.$row['isbn'].'     <br>        	 
                                                      									idAuteur : '.$row['idAuteur'].' <br>                            	      
                                                                                           genre  :  '.$row['genre'].' <br>
                                                                                           <ul>
                                                                      <li> <a href="cart.php?remove='.$row['isbn'].'" class="btn btn-sm" 
                                                                          style="background:green;color:white;font-weight:800;">
                                                                          Remove </a></li>
                                                                          <li> <a href="description.php?ID='.$row['isbn'].'" class="btn btn-sm" 
                                                                          style="background:green;color:white;font-weight:800;">
                                                                          view book </a></li>
                                                                    
                                                                        </ul>
                                        </div>
                                    </div>';
                               if($j % 2==1)
                                   echo '</div>';                                 
                               
                               $i++;
                               $j++;                                                 
                     } 
                    
                
                     echo '<br> <br>';
                     echo '<div class="row">
                        
                             </div>
                             <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-1 col-lg-4 ">
                                  <a href="cart.php?place=true" class="btn btn-lg" style="background:green;color:white;font-weight:800;margin-top:5px;">effacer tout</a>
                             </div>
                           </div>
                           ';
                } 
               else
                     {  
                        echo ' 
                         <div class="row">
                            <div class="col-xs-9 col-xs-offset-3 col-sm-4 col-sm-offset-5 col-md-4 col-md-offset-5">
                                 <span class="text-center" style="color:#D67B22;font-weight:bold;">&nbsp &nbsp &nbsp &nbspCart Is Empty</span>
                             </div>
                         </div>
                      ';
                     }               
	    }
	else
	    { 
	          echo "login to continue";
	    }
        echo '</div>';
	?>
<footer class="text-center">
  <h5>© EhtpReads<span class="orange"> .</span></h5>
</footer>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
<html>		