<?php
namespace model;
class kullanicilar{

    private $conn;

    public function __construct($dbconnect){
        $this->conn = $dbconnect;
    }

    public function addUsers($username, $email, $password, $displayName, $bio, $profilePicture)
    {
       $sql = "INSERT INTO kullanicilar (Username, Email, PasswordHash, DisplayName, Bio, ProfilePicture, CreatedAt)
            VALUES (:username, :email, :passwordHash, :displayName, :bio, :profilePicture, :createdAt)";
       $stmt = $this->conn->prepare($sql);

       $passwordHash = password_hash($password, PASSWORD_DEFAULT);

       $stmt->bindParam(':username',$username);
       $stmt->bindParam(':email',$email);
       $stmt->bindParam(':passwordHash',$passwordHash);
       $stmt->bindParam(':displayName',$displayName);
       $stmt->bindParam(':bio',$bio);
       $stmt->bindParam(':profilePicture',$profilePicture);
       

       $createdAt = date('Y-m-d H:i:s');
       $stmt->bindParam('createdAt',$createdAt);

       return $stmt->execute();
    }
    
    public function updateUsers($userId, $username = null, $email = null, $password = null, $displayName = null, $bio = null, $profilePicture = null)
    {
       $updateFields = [];
       $params = [':userid',$userId];

       if($username !== null)
       {
         $updateFields[] = "Username = :username";
         $params[':username'] = $username;
       }

       if($email !== null)
       {
         $updateFields[] = "Email = :email";
         $params[':email'] = $email;
       }

       if($password !==null)
       {
          $updateFields[] = "PasswordHash = :passwordHash";
          $params[':passwordHash'] = password_hash($password, PASSWORD_DEFAULT);
       }

       if($displayName !== null)
       {
         $updateFields[] = "DisplayName = :displayName";
         $params[':displayName'] = $displayName;
       }

       if($bio !== null)
       {
         $updateFields[] = "Bio = :bio";
         $params[':bio'] = $bio;
       }

       if($profilePicture !== null)
       {
         $updateFields[] = "ProfilePicture = :profilePicture";
         $params[':profilePicture'] = $profilePicture;
       }
    
       if (empty($updateFields)) 
       {
         return false;
       }

      $sql = "UPDATE kullanicilar SET " . implode(', ', $updateFields) . " WHERE UserID = :userId";
    
      $stmt = $this->conn->prepare($sql);

      return $stmt->execute($params);
    }

    public function deleteUsers($userid)
    { 
      
       $sql = "DELETE FROM kullanicilar WHERE id = :id";

       $stmt = $this->conn->prepare($sql);
       $stmt->bindParam(':id', $userid);

       return $stmt->execute();
    }

    public function getUsers($userid)
    {
        $sql = "SELECT * FROM kullanicilar WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $userid);
        $stmt -> execute();

        return $stmt->fetch(); // Tek kullanıcıyı dizi olarak döner
    }
    


}

?>