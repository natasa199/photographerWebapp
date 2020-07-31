<?php
require_once 'DAOPhotographer.php';

class ControllerPhotographer{

    public function home() {
        include 'home.php';
    }
    public function portfolio() {
        include 'portfolio.php';
    }
    public function contact(){
        include 'contact.php';
    }
    
    public function contactValiation(){
        $name=isset($_POST['name'])?$_POST['name'] :"" ;
        $email=isset($_POST['email'])?$_POST['email']:"" ;
        $message=isset($_POST['message'])?$_POST['message']:"" ;
        if(!empty($name) && !empty($email) && !empty($message)){
            $dao= new DAOPhotographer();
            $dao->insertMessage($name,$email,$message);
            $msg="Message has been submited.";
            include 'contact.php';
        }
        else{
            $msg="All forms are required.";
            include 'contact.php';
        }
    
}
}
?>