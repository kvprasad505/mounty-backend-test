<?php
include 'connection.php';
   if(isset($_POST['upload']))
   {
    $name=$_POST["Productname"];
    $cp=$_POST["costprice"]; 
    $sp=$_POST["sellingprice"]; 
    $desc=$_POST["desc"]; 
    if(($name && $cp) && ($sp && $desc)){
      
    $sql="INSERT INTO products (name,costprice,sellingprice,description) VALUES ('$name','$cp','$sp','$desc')";
    if(mysqli_query($con,$sql))
    {
        $sql2="SELECT id FROM products where name='$name'";
        $query2=mysqli_query($con,$sql2);
        while($row=$query2->fetch_assoc()){
            // $data[]=$row;
            $id=$row['id'];
             }
            echo "product details saved successfully<br>";
    }
    else{echo "sorry!! database connection problem";}


    for($i=0;$i<=count($file_name=$_FILES['img']['name'])-1;$i++){
       $file_name=$_FILES['img']['name'][$i];
       $file_type=$_FILES['img']['type'][$i];
    //    $file_size=$_FILES['img']['size'];
       $tmpname=$_FILES['img']['tmp_name'][$i];
       $file_store="upload/".$file_name;
        //    $name=addslashes($file_name[$i]);
        //    $tmp=addslashes(file_get_contents($tmpname[$i]));
        if(move_uploaded_file($tmpname, $file_store)){
             $sql3="INSERT INTO images (pid,images) VALUES ('$id','$file_name')";
             $query3=mysqli_query($con,$sql3);
            echo"images saved successfully";
        }else{
            echo"images uploading failed";
        }
       }

    }else{
        echo "please enter all details";
    }
   }
?>

<!DOCTYPE html>  
<html>  
  <head>  
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>home page</title>  
 </head>  
  <body>  
      <div class="aa">
      <a href="products.php">click here to view all products</a> <br/>
    <h1>Please enter the product details</h1>
    <br/>

    <form action="?" method="post" enctype="multipart/form-data">  
      <p>Product name: <input type="text" name="Productname"> </p>
      <p>cost price: <input type="number" name="costprice"> </p>
      <p>selling price: <input type="number" name="sellingprice"> </p>
      <p>description:<input type="text" name="desc" style="width: 200px; height:50px; padding: 2px"> </p>
      <!-- <input type="submit" value="Submit">  -->
      <p><input type="file" accept="image/*" name="img[]" multiple="multiple"> </p>

      <input type="submit" name="upload" value="save to database">
    </form>
    
 </div>
  </body>  
</html>