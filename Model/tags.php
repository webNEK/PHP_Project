<?php
namespace model;
class tags{
    
    private $conn;
    private $table = "tags";

    public function __construct($dbconnect)
    {
        $this ->conn = $dbconnect;
    }

    public function addTags($name)
    {
           $sql = "INSERT INTO Tags(Name, CreatedAt)
            VALUES(:name, :createdat)"; 

    $stmt = $this->conn->prepare($sql);
    $createdAt = date('Y-m-d H:i:s');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':createdat', $createdAt);
    
    return $stmt->execute();
    }
    
      // Tag'i ID ile getir
    public function getTags($tagID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE TagID = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $tagID);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Tag'i güncelle (örneğin Name)
    public function updateTags($tagID, $name) 
    {
        $query = "UPDATE " . $this->table . " SET Name = :name WHERE TagID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $tagID, );
        return $stmt->execute();
    }

    // Tag'i sil
    public function deleteTags($tagID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE TagID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $tagID);
        return $stmt->execute();
    }
   
}
?>