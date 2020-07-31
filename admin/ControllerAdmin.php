<?php
require_once 'DAOAdmin.php';

class ControllerAdmin{

     function adminLogin() {
        include 'adminLogin.php';
    }

     function adminHome() {
        include '../adminHome/adminHome.php';
    }
     function adminPortfolio() {
		 $dao= new DAOAdmin();
		 $dao->selectPortfolio();
        include '../adminPortfolio/adminPortfolio.php';
    }
     function adminAddPicture() {
        include '../adminPortfolio/adminAddPicture.php';
    }

     function editPorftolio(){
         include '../adminPortfolio/adminEditPortfolio.php';

    }
    
     function adminLoginValidation(){
        $email=isset($_POST['email'])?$_POST['email']:"" ;
        $password=isset($_POST['password'])?$_POST['password']:"" ;
        if(!empty($email) && !empty($password)){
            $dao= new DAOAdmin();
            $admin=$dao->selectAdmin($email,$password);
            if($admin){
                session_start();
                $_SESSION['loggedin']=$admin;
                header("Location:?action=adminHome");
            }
            else{
                $msg="Wrong email or password, try again!!";
                include 'adminLogin.php';
            }
            }else{
                $msg="All forms are mandatory!";
                include 'adminLogin.php';
        }
    
}

       function deleteMessage(){
    
        $id = isset($_GET['id'])?$_GET['id']:'';
   
           $dao=new DAOAdmin();
           $dao->deleteMessages($id);
           include '../adminHome/adminHome.php';
       }

       function deleteImage(){
    
        $id = isset($_GET['id'])?$_GET['id']:'';
   
           $dao=new DAOAdmin();
           $dao->deleteImage($id);
           include '../adminPortfolio/adminEditPortfolio.php';
       }

       function insertPicture(){
        $caption=isset($_POST['caption'])?$_POST['caption']:"";
        $caption_opacity=isset($_POST['opacityCaption'])?$_POST['opacityCaption']:"";   
        $fileInsert= $_FILES['fileInsert'];
        $fileNameInsert= $_FILES['fileInsert']['name'];
        $fileTmpNameInsert= $_FILES['fileInsert']['tmp_name'];
        $fileSizeInsert= $_FILES['fileInsert']['size'];
        $fileErrorInsert= $_FILES['fileInsert']['error'];
        $fileTypeInsert= $_FILES['fileInsert']['type'];
        $fileExtInsert = explode('.', $fileNameInsert);
        $fileActualExtInsert = strtolower(end($fileExtInsert));
        $allowedInsert = array('jpg', 'jpeg', 'png', 'pdf');
        $dao=new DAOAdmin();
    
        if(in_array($fileActualExtInsert, $allowedInsert)){
            if($fileErrorInsert===0)
            {
                if($fileSizeInsert<1000000){
                    $fileNameNewInsert= uniqid('', true). "." . $fileActualExtInsert;
                    $fileDestinationInsert = 'uploads/'. $fileNameNewInsert; 
                    move_uploaded_file($fileTmpNameInsert, $fileDestinationInsert);  }
         include 'adminPortfolio.php';
    
             } else {
                $msg= "Your file is too large!!";
                include 'adminAddPicture.php';
            }
    
    $dao->insertPicture($fileDestinationInsert,$caption,$caption_opacity);
    } 
    }

    function goEditPortfolio(){
        $id=isset($_GET['image_id'])?$_GET['image_id']:"";
        include '../adminPortfolio/adminEditPortfolio.php';
    }
       


function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location:../admin/?action=logout");
}
}
?>