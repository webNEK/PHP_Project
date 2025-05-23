<?php
namespace model;
class kategoriler{

    private $conn;
    private $table = "kategoriler";
    public function __construct($dbconnect)
    {
       $this->conn = $dbconnect;
    }

    public function addCategorys($categoryid,$name)
    {
        $sql = "INSERT INTO kategoriler(CategoryID, Name)
        VALUES(:categoryid, :name)";

        $stmt= $this->conn->prepare($sql);

        $stmt->bindParam(":categoryid",$categoryid);
        $stmt->bindParam(":name",$name);

        return $stmt->execute();
    }

   // Kategoriyi ID ile getir
    public function getCategorys($categoryID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE CategoryID = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryID);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Kategoriyi güncelle (örneğin Name)
    public function updateCategorys($categoryID, $name) 
    {
        $query = "UPDATE " . $this->table . " SET Name = :name WHERE CategoryID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $categoryID);
        return $stmt->execute();
    }

    // Kategoriyi sil
    public function deleteCategorys($categoryID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE CategoryID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryID);
        return $stmt->execute();
    }



}
?>