<?php 
    session_start();
    $db = mysqli_connect("localhost", "root", "", "ehtpreads");
    
    
    include ('functions.php');

    


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $isSuccess = true; 
        
        $idLivre= $_POST["idLivre"];
        $rating  = !empty($_POST['rating']) ? $_POST['rating'] : NULL;
  
        if($rating==0)
        {
            $isSuccess = false;
        }
        
        
        if($isSuccess) 
        {

            $result = mysqli_query($db, "INSERT INTO rating (numbook,php,rater)  VALUES('$idLivre','$rating', ".$_SESSION['id_user'].")");


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