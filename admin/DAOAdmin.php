<?php
require_once '../../config/db.php';

class DAOAdmin{
    private $db;
    private $selectMessages= "Select * from messages";
    private $selectAdmin= "Select email,password from admins where email=? and password=?";
    private $selectPortfolio="select image_id,image,caption,caption_opacity from portfolio";
    private $deleteMessage= "DELETE  from messages where message_id=?";
    private $deleteImage= "DELETE  from portfolio where image_id=?";
    private $insertMessage = "INSERT INTO messages (name,email,message, date) VALUES (?,?,?,CURRENT_TIMESTAMP)";
    private $insertPicture = "INSERT INTO portfolio (image,caption,caption_opacity) VALUES (?,?,?)";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }
    
    public function deleteImage($image_id)
    {
        $statement = $this->db->prepare($this->deleteImage);
        $statement->bindValue(1, $image_id);
        $statement->execute();
    }

    public function deleteMessages($message_id)
    {
        $statement = $this->db->prepare($this->deleteMessage);
        $statement->bindValue(1, $message_id);
        $statement->execute();
    }
    public function selectMessages()
    {
        $statement = $this->db->prepare($this->selectMessages);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    public function selectAdmin($email,$password)
    {   $statement = $this->db->prepare($this->selectAdmin);
        $statement->bindValue(1, $email);
        $statement->bindValue(2, $password);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
    public function selectPortfolio()
    {   $statement = $this->db->prepare($this->selectPortfolio);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    public function insertPicture($image,$caption,$caption_opacity)
    {
        $statement = $this->db->prepare($this->insertPicture);
        $statement->bindValue(1, $image);
        $statement->bindValue(2, $caption);
        $statement->bindValue(3, $caption_opacity);
        $statement->execute();
}

}
?>