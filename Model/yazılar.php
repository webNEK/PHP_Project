<?php
namespace model;
 class yazılar{
        
      private $conn;
      private $table = "yazılar";
      public function __construct($dbconnect)
      {
        $this->conn= $dbconnect;
      }

      public function addContent($userid,$title,$content)
      {
        $sql = "INSERT INTO yazılar (UserID,Title,Content,CreatedAt)
                VALUES(:userid,:title,content,createdat)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(":userid",$userid);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":content",$content);

        $createdAt = date('Y-m-d H:i:s');
        $stmt->bindParam('createdAt',$createdAt);

        return $stmt->execute();
      }

       // Post getir (PostID ile)
      public function getContent($postID) 
      {
        $query = "SELECT * FROM " . $this->table . " WHERE PostID = :postID LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->execute();
        return $stmt->fetch();
      }

      
    // Post güncelle (Title ve Content)
    public function updateContent($postID, $title, $content) 
    {
        $query = "UPDATE " . $this->table . " SET Title = :title, Content = :content, UpdateAt = NOW() WHERE PostID = :postID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':postID', $postID);
        return $stmt->execute();
    }

    // Post sil
    public function deleteContent($postID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE PostID = :postID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        return $stmt->execute();
    }

 }
?>