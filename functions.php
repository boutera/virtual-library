<?php 
    
    

    function getUserNameById($id){

        global $db;
        $result = mysqli_query($db, "SELECT login FROM utilisateur WHERE idUtilisateur = $id");
        $item = mysqli_fetch_assoc($result);
      
        return $item['login'];
    }

    function getAuthorNameById($id){

        global $db;
        $result = mysqli_query($db, "SELECT nom FROM auteur WHERE idAuteur = $id");
        $item = mysqli_fetch_assoc($result);
      
        return $item['nom'];
    }
    

    function getBookTitleById($id){

        global $db;
        $result = mysqli_query($db, "SELECT titre FROM livre WHERE isbn = $id");
        $item = mysqli_fetch_assoc($result);
        
        return $item['titre'];

    }


    function getCommentsCountByPostId($id){
        global $db;
        $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM post_comments WHERE idPost = $id");
        $item = mysqli_fetch_assoc($result);

        return $item['total'];
    }

    function getCommentsCountByBookId($id){
        global $db;
        $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM book_comments WHERE idLivre = $id");
        $item = mysqli_fetch_assoc($result);

        return $item['total'];
    }


    function getGenreById($id){

        global $db;
        $result = mysqli_query($db, "SELECT genre FROM livre WHERE isbn = $id");
        $item = mysqli_fetch_assoc($result);

        return $item['genre'];
    }


    function getImageByBookId($id){

        global $db;
        $result = mysqli_query($db, "SELECT image FROM livre WHERE isbn = $id");
        $item = mysqli_fetch_assoc($result);

        return $item['image'];

    }

    function getCommentCountByPostId($id){

      global $db;
      $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM post_comments WHERE idPost = $id");
      $item = mysqli_fetch_assoc($result);

      return $item['total'];

  }
  function getUtilisateurIdById($id){

    global $db;
    $result = mysqli_query($db, "SELECT idutilisateur FROM reply_object WHERE idreply = $id");
    $item = mysqli_fetch_assoc($result);
  
    return $item['idutilisateur'];
}
  function getLastId(){

    global $db;
    $result = mysqli_query($db, "SELECT MAX(idReply) as maxreply FROM post_reply ");
    $item = mysqli_fetch_assoc($result);
  
    return $item['maxreply']+1;
}
  function getCommentCountByBookId($id){

    global $db;
    $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM book_comments WHERE idLivre = $id");
    $item = mysqli_fetch_assoc($result);

    return $item['total'];

}
function iscontain($id){

    global $db;
    $result = mysqli_query($db, "SELECT idreply FROM reply_object where idreply=$id");
 
if(mysqli_num_rows($result)>0)
    return true;
else
    return false;
}

function getReplyCountByIdComment($id){

    global $db;
    $result = mysqli_query($db, "SELECT COUNT(*) AS total FROM post_reply WHERE idParent = $id  ");
    $item = mysqli_fetch_assoc($result);

    return $item['total'];

}
  function stars($rating){
      echo " ";
    for($i = 0; $i < 5; $i++){
        if($i < $rating){
            echo "<i class='fas fa-star glow'></i>";
        } else {
            echo "<i class='fas fa-star'></i>";
        }
    }
}

        function getRatingById($idUser,$idBook){

            global $db;
            $result = mysqli_query($db, "SELECT php FROM rating WHERE rater = $idUser AND numbook = $idBook");
            $item = mysqli_fetch_assoc($result);

            return $item['php'];

        }

        function getTotalRatingById($idBook){

            global $db;
            $result = mysqli_query($db, "SELECT ROUND(AVG(php),1) as total FROM rating WHERE numbook = $idBook");
            $item = mysqli_fetch_assoc($result);

            return $item['total'];

        }

?>