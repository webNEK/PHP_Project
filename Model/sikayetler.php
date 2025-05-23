<?php
namespace model;
class sikayetler{

    private $conn;
    private $table = "sikayetler";
     
    public function __construct($dbconnect)
    {
        $this->conn= $dbconnect;
    }

    public function addComplaints($postid,$userid,$reason)
    { 
       $sql = "INSERT INTO sikayetler(PostID,UserID,Reason,CreadetAt)
       VALUES(:postid,:userid,:reason,:createdat)";

       $stmt = $this->conn->prepare($sql);

       $stmt->bindParam(':postid',$postid);
       $stmt->bindParam(':userid',$userid);
       $stmt->bindParam('reason',$reason);

       $createdat = date('Y-m-d H:i:s');
       $stmt->bindParam(':createdat',$createdat);

       return $stmt->execute();
    }

     // Şikayeti ID ile getir
    public function getComplaints($reportID) 
    {
        $query = "SELECT * FROM " . $this->table . " WHERE ReportID = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $reportID);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Şikayeti güncelle (örneğin Reason)
    public function updateComplaints($reportID, $reason) 
    {
        $query = "UPDATE " . $this->table . " SET Reason = :reason WHERE ReportID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':id', $reportID);
        return $stmt->execute();
    }

    // Şikayeti sil
    public function deleteComplaints($reportID) 
    {
        $query = "DELETE FROM " . $this->table . " WHERE ReportID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $reportID);
        return $stmt->execute();
    }
}
?>