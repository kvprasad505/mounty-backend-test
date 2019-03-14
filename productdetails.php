<!DOCTYPE html>  
<html>  
  <head>  
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Product details</title>  
 </head>  
  <body> 

<?php
include 'connection.php';
if(isset($_POST['viewdetails']))
{
 $id=$_POST["id"];
 if($id){
     $sql1="SELECT products.id,products.name, products.sellingprice,products.description,images.images FROM products 
             INNER JOIN images ON products.id=$id and images.pid=$id";
     $query1=mysqli_query($con,$sql1);
 }

?>
<div class="container">
    <?php while($row=$query1->fetch_assoc()){
        echo "<img src='upload/".$row['images']."' width='50px' height='120px'>"; ?> <br/>
     <b> <?php  echo $row['name']; ?></b> <br/>
      Price: <?php echo $row['sellingprice']; ?> <br/>
      <b>Descripton:</b> <?php echo $row['description'];  ?> <br/>
    <?php  } }?> <br/>

    <a href="#" onclick="document.getElementById('inputField').style.display = 'block';">BUY NOW</a><br/>
    <div id="inputField" style="display:none;">
    <form action="?" method="post">
         <p>Name : <input type="text" name="name" /></p>
         <p>mobile : <input type="number" name="mobile" /></p>
         <p>address : <input type="text" name="address" /></p>
         <input type="submit" name="confirm" value="confirm order">
    </form>
          </div>
    <?php
    if(isset($_POST['confirm']))
    {
     $name=$_POST["name"];
     $mobile=$_POST["mobile"]; 
     $address=$_POST["address"]; 
     if(($name && $mobile) && $address){
         echo"order confirmation<br>";
         $order_id = time() . mt_rand();
         echo "your order no is ".$order_id;
     }else{
         echo "please fill all the fields";
     }
    }
    ?>
</div>

</body>
</html>