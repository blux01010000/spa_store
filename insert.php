<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $image = '';
  if($_FILES["product_image"]["name"] != '')
  {
   $image = upload_image();
  }
  $statement = $connection->prepare("
   INSERT INTO products (description, image) 
   VALUES (:description, :image)
  ");
  $result = $statement->execute(
   array(
    ':description' => $_POST["description"],
    ':image'  => $image
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
 if($_POST["operation"] == "Edit")
 {
  $image = '';
  if($_FILES["product_image"]["name"] != '')
  {
   $image = upload_image();
  }
  else
  {
   $image = $_POST["hidden_product_image"];
  }
  $statement = $connection->prepare(
   "UPDATE products 
   SET description = :description, image = :image  
   WHERE id = :id
   "
  );
  $result = $statement->execute(
   array(

    ':description' => $_POST["description"],
    ':image'  => $image,
    ':id'   => $_POST["product_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>