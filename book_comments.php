<?php 
    session_start();
    $db = mysqli_connect("localhost", "root", "", "ehtpreads");
    
    
    include ('functions.php');

    $isSuccess = false;


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $comment = test_input($_POST["comment"]);
        $idLivre= $_POST["idLivre"];
  
        $isSuccess = true; 
        
        
        if($isSuccess) 
        {
            $result = mysqli_query($db, "INSERT INTO book_comments (contenu,idUtilisateur,dateCreation,idLivre) values('$comment',".$_SESSION['id_user'].",now(), '$idLivre' )");

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