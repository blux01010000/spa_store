<?php
include('db.php');
include('function.php');
if(isset($_POST["product_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM products 
  WHERE id = '".$_POST["product_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["description"] = $row["description"];
  if($row["image"] != '')
  {
   $output['product_image'] = '<img src="assets/img/'.$row["image"].'" class="img-thumbnail" width="320" height="320" /><input type="hidden" name="hidden_product_image" value="'.$row["image"].'" />';
  }
  else
  {
   $output['product_image'] = '<input type="hidden" name="hidden_product_image" value="" />';
  }
 }
 echo json_encode($output);
}
?>
   