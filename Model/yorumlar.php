<?php
namespace model;
class yorumlar{
    
    private $conn;
    private $table = "yorumlar";
     public function __construct($dbconnect)
      {
        $this->conn= $dbconnect;
      }

      public function addPost($postid,$userid,$content)
      { 
        $sql = "INSERT INTO yorumlar(PostID,UserID,Content,CreatedAt)
        VALUES(:postid,:userid,:content,:createdat)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':postid',$postid);
        $stmt->bindParam(':userid',$userid);
        $stmt->bindParam(':content',$content);

        $createdAt = date('Y-m-d H:i:s');
        $stmt->bindParam(':createdat',$createdAt);
      }

      // Yorum getir (CommentID ile)
    public function getPost($commentID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE CommentID = :commentID LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':commentID', $commentID);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Posta ait tüm yorumları getir (PostID ile)
    public function getByPost($postID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE PostID = :postID ORDER BY CreatedAt DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':postID', $postID);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Yorum güncelle (Content)
    public function updatePost($commentID, $content) 
    {
        $query = "UPDATE " . $this->table . " SET Content = :content WHERE CommentID = :commentID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':commentID', $commentID);
        return $stmt->execute();
    }

    // Yorum sil
    public function deletePost($commentID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE CommentID = :commentID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':commentID', $commentID);
        return $stmt->execute();
    }

}
?>