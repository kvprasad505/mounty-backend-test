<!DOCTYPE html>  
<html>  
  <head>  
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>List of all Products</title>  
 </head>  
  <body> 
  <a href="home.php">Go back to home page</a> 

  <div class="grid-container">
  <?php
include 'connection.php';
$sql1="SELECT products.id,products.name, products.sellingprice,products.description,images.images FROM products 
INNER JOIN images ON products.id=images.pid";
        $query1=mysqli_query($con,$sql1);
        while($row=$query1->fetch_assoc()){?>
            <div class="grid-item">
        <?php  
        $id=$row['id'];
        echo "<img src='upload/".$row['images']."' width='50px' height='120px'>"; ?> <br/>
      <P><b><?php echo $row['name']; ?></b><br/>
      price:<?php echo $row['sellingprice']; ?>  <br/>
      <form action="productdetails.php" method="post" enctype="multipart/form-data"> 
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="submit" name="viewdetails" value="View details"></p>
        </form>
    </div>
    <?php } ?>

</div>

</body>
</html>