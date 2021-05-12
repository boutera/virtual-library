<?php 
    session_start();
    $db = mysqli_connect("localhost", "root", "", "ehtpreads");
    
    
    include ('functions.php');

    $isSuccess = false;


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $comment = test_input($_POST["comment"]);
        $idPost= $_POST["idPost"];
  
        $isSuccess = true; 
        
        
        if($isSuccess) 
        {
            $result = mysqli_query($db, "INSERT INTO post_comments (contenu,idUtilisateur,dateCreation,idPost) values('$comment',".$_SESSION['id_user'].",now(), '$idPost' )");

        }
        
        
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $reply = test_input($_POST["reply"]);
        $idComment = test_input($_POST['idParent']);
  
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