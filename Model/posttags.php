<?php
namespace model;
class posttags{

     private $conn;
     private $table = "posttags";
    public function __construct($dbconnect)
    {
        $this->conn= $dbconnect;
    }

    public function addPosttags($postid,$tagid)
    {
      $sql = "INSERT INTO posttags(PostID,TagID)
      VALUES(:postid,:tagid)";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(':postid',$postid);
      $stmt->bindParam(':tagid',$tagid);
    }

   // Bir postun tüm taglarını getir
    public function getTagsByPost($postID) 
    {
        $query = "SELECT TagID FROM " . $this->table . " WHERE PostID = :postID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Bir tage ait tüm postları getir
    public function getPostsByTag($tagID) 
    {
        $query = "SELECT PostID FROM " . $this->table . " WHERE TagID = :tagID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tagID', $tagID);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // İlişkiyi sil
    public function deletePosttags($postID, $tagID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE PostID = :postID AND TagID = :tagID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->bindParam(':tagID', $tagID);
        return $stmt->execute();
    }
}
?>