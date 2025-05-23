<?php
 namespace model;
 class begeniler{
    
    private $conn;
    private $table = "begeniler";

    public function __construct($dbconnect)
    {
      $this->conn= $dbconnect;
    }

    public function addLikes($PostID,$UserID)
    { 
      $sql = "INSERT INTO begeniler(PostID,UserID,CreatedAt)
      VALUES(:postid,:userid,:createdat)";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam('postid',$PostID);
      $stmt->bindParam('userid',$UserID);

      $createdAt = date('Y-m-d H:i:s');
      $stmt->bindParam('CreatedAt',$createdAt);

      return $stmt->execute();

    }

       // Beğeniyi ID ile getir
    public function getLikes($likeID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE LikeID = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $likeID);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Beğeniyi güncelle (örneğin PostID ve UserID)
    public function updateLikes($likeID, $postID, $userID) 
    {
        $query = "UPDATE " . $this->table . " SET PostID = :postID, UserID = :userID WHERE LikeID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':id', $likeID);
        return $stmt->execute();
    }

    // Beğeniyi sil
    public function deleteLikes($likeID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE LikeID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $likeID);
        return $stmt->execute();
    }


 }
?>