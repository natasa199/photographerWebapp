<?php
require_once '../config/db.php';

class DAOPhotographer {
    private $db;
    private $selectMessages= "Select * from messages";
    private $insertMessage = "INSERT INTO messages (name,email,message, date) VALUES (?,?,?,CURRENT_TIMESTAMP)";
	private $selectPortfolio="select * from portfolio";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function insertMessage($name,$email,$message)
    {
        $statement = $this->db->prepare($this->insertMessage);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $email);
        $statement->bindValue(3, $message);
        $statement->execute();
}
 public function selectPortfolio()
    {   $statement = $this->db->prepare($this->selectPortfolio);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


}
?>