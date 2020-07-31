<?php
require_once '../DAOAdmin.php';
$dao=new DAOAdmin();
    $messages=$dao->selectMessages();
		$msg=isset($msg)?$msg:"";
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="../../style/style.css">
<link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@300&display=swap" rel="stylesheet">
<title>Rofi photographer22</title>
<style>
th,tr,td {
  background-color:rgba(1,1,1,0.5);
  color: orange;
}

</style></head>
  <body>
  <div class="container">
    <?php include '../../partials/adminsidebar.php'; ?>
    <?php include '../../partials/section.php'; ?> 

    <table class="t" align="center">
  <tr class="t01">
<th>Message ID</th>
    <th>Name</th> 
    <th>Email</th>
      <th>Message</th>
     <th>Delete</th>     
  </tr>
  <?php
    foreach($messages as $m){?>
  <tr class="t01">
    <td class="t01"><?php echo $m["message_id"];?></td>
<td><?php echo $m["name"];?></td>    
<td><?php echo $m["email"];?></td>
<td><?php echo $m["message"];?></td> 
<td><a href='?action=deleteMessage&id=<?php echo $m["message_id"];?>'>Delete</a></td>
</tr>
  <?php }?> 
</table>
   
    <?php include '../../partials/footer.php'; ?>

  </div>
  </body>
</html>