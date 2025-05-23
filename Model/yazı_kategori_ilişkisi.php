<?php
namespace model;
class yazı_kategori_ilişkisi{

     private $conn;
     private $table = "yazı_kategori_ilişkisi";
     
    public function __construct($dbconnect)
    {
        $this->conn= $dbconnect;
    }

    public function addCategoriesByPost($postid,$categoryid)
    {
      $sql = "INSERT INTO yazı_kategori_ilişkisi(PostID,CategoryID)
      VALUES(:postid,:categoryid)";

      $stmt = $this->conn->preapre($sql);

      $stmt ->bindParam(':postid',$postid);
      $stmt ->bindParam(':categoryid',$categoryid);

      return $stmt->execute();
    }

      // Bir postun kategorilerini getir
     public function getCategoriesByPost($postID) 
     {
        $query = "SELECT CategoryID FROM " . $this->table . " WHERE PostID = :postID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Bir kategorinin yazılarını getir
     public function getPostsByCategory($categoryID) 
     {
        $query = "SELECT PostID FROM " . $this->table . " WHERE CategoryID = :categoryID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':categoryID', $categoryID);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
     // İlişkiyi sil
    public function deletePostsByCategory($postID, $categoryID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE PostID = :postID AND CategoryID = :categoryID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->bindParam(':categoryID', $categoryID);
        return $stmt->execute();
    }

}
?>