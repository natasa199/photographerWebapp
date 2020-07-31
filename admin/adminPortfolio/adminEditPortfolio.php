<?php
require_once '../DAOAdmin.php';
$dao=new DAOAdmin();
    $portfolio=$dao->selectPortfolio();
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
  <th>Image ID</th>
    <th>Image</th>
    <th>Caption</th> 
    <th>Caption opacity</th>
      <th>Delete</th>
  </tr>
  <?php
    foreach($portfolio as $p){?>
  <tr class="t01">
    <td class="t01"><?php echo $p["image_id"];?></td>
<td><?php echo "<img src='../../admin/adminPortfolio/". $p['image']. "'' width=100px height=100px> ";?></td>    
<td><?php echo $p["caption"];?></td>
<td><?php echo $p["caption_opacity"];?></td> 
<td><a href='?action=deletePicture&id=<?php echo $p["image_id"];?>'>Delete</a></td>
</tr>  
  <?php }?> 
</table>

  </body>
</html>