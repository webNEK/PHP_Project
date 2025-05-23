<?php
namespace model;
class bildirimler{

     private $conn;
     private $table = "bildirimler";
     public function __construct($dbconnect)
      {
        $this->conn= $dbconnect;
      }

      public function addNotifications($userid,$message,$link,$readed)
      {
        $sql ="INSERT INTO bildirimler(UserID, Message,Link,CreatedAt,Readed)
        VALUES (:userid,:message,:link,:createdAt,:readed)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':userid',$userid);
        $stmt->bindParam(':message',$message);
        $stmt->bindParam(':link',$link);

        $createdAt = date('Y-m-d H:i:s');
        $stmt->bindParam(':createdAt',$createdAt);
        $stmt->bindParam(':readed',$readed);

        return $stmt->execute();
      }
      
         public function getNotifications($notificationID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE NotificationID = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $notificationID);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateNotifications($notificationID, $message, $link, $readed) 
    {
        $query = "UPDATE " . $this->table . " SET Message = :message, Link = :link, Readed = :readed WHERE NotificationID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':readed', $readed);
        $stmt->bindParam(':id', $notificationID);
        return $stmt->execute();
    }

    public function deleteNotifications($notificationID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE NotificationID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $notificationID);
        return $stmt->execute();
    }
   
    


}
?>