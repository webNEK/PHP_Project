<?php
namespace model;
class takipciler{
    
    private $conn;
    private $table = "takipciler";
    public function __construct($dbconnect)
    {
        $this->conn = $dbconnect;
    }
    
    public function addFollowers($followerid,$followesid)
    {
      $sql = "INSERT INTO takipciler(FolloweID,FollowesID,CreatedAt)
      VALUES(:followerid,:followesid,:createdat)";

      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(':followerid',$followerid);
      $stmt->bindParam(':followesid',$followesid);

      $createdat = date('Y-m-d H:i:s');
      $stmt->bindParam(':createdat',$createdat);

      return $stmt->execute();
    }

      public function getFollowers($followeID) 
      {
        $query = "SELECT * FROM " . $this->table . " WHERE FolloweID = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $followeID);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Takip ilişkisini sil
    public function deleteFollowers($followeID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE FolloweID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $followeID);
        return $stmt->execute();
    }

    // İstersen takip edilen kişinin tüm takipçilerini alabiliriz
    public function getFollowersOf($followesID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE FollowesID = :followesID";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':followesID', $followesID);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    
}
?>