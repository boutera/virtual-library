<?php
session_start();
if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/my.css" type="text/css">
<body>
<style>

        #books .row{margin-top:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .book-block {margin-top:20px;margin-bottom:10px; padding:10px 10px 10px 10px; border :1px solid #DEEAEE;border-radius:10px;height:100%;}
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
                echo' <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>';
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
include "database.php";
$keyword=$_POST['keyword'];

$query="SELECT  * from livre inner join auteur on livre.idAuteur=auteur.idAuteur where isbn like '%{$keyword}%' OR titre like '%{$keyword}%' OR nom like '%{$keyword}%' OR genre like '%{$keyword}%'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));;

    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#00B9F5;text-transform:uppercase;"> found  '. mysqli_num_rows($result) .' records </h4>
           </div>
        </div>';
        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="images/" .$row['isbn'].".jpg";
            $description="description.php?ID=".$row["isbn"];
            if($i % 3 == 0)  $offset= 0;
            else  $offset= 1; 
            if($i%3==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'">
                <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-'.$offset.' col-lg-3 text-center w3-card-8 w3-dark-grey">
                    <div class="book-block">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        <hr>
                         ' . $row["titre"] . '<br>
                        ' . $row["genre"] .'  &nbsp
                        
                    </div>
                </div>
                
               </a> ';
            $i++;
            if($i%3==0)
            echo '</div>';
            }
        }
    echo '</div>';
?>


</body>
</html>		