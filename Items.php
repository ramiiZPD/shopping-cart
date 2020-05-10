<?php
	require_once('databaseconn.php');
?>
<!DOCTYPE html>
<html>

<head>

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/index.js"></script>
</head>

<body>

  <h2><center>ADDED ITEMS</center></h2>

  <div class="row">
  <div class="col-sm-6" s>
    <a style="padding-left: 30px;color:red" href="additems.php">Direct to Item Form</a>
  </div>
  
</div>

  <div>
                      <?php


                        if( isset($_POST['load'])){

                          $itemnameval = $_POST['itemnameval'];

                        }

                       

                        if( isset($_POST['delete'])){

                          $sql = "DELETE FROM items WHERE id=" . $_POST['itemid'];
                      
                          if($conn->query($sql) === TRUE){
                      
                              echo "<div class='alert alert-success'>Item Deleted Successfully</div>";
                      
                          }
                      
                      }
                        
                      ?>
                    </div>

  <div class="container">
    <h2>Item Details</h2>
   
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Gender</th>
          <th>Type</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Item Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      
      <?php

        $result = mysqli_query($conn,"SELECT * FROM items");

        while($row = mysqli_fetch_array($result))
        {
          echo "<form action='' method='POST'>";
          echo "<input type='hidden' value='". $row['id']."' name='itemid' />";
          echo "<input type='hidden' value='". $row['gender']."' name='genderval' />";
          echo "<input type='hidden' value='". $row['itemname']."' name='itemnameval' />";
          echo "<input type='hidden' value='". $row['itemprice']."' name='itempriceval' />";
          echo "<input type='hidden' value='". $row['type']."' name='typeval' />";
          echo "<input type='hidden' value='". $row['contactdetails']."' name='contactdetailsval' />";
          echo "<input type='hidden' value='". $row['itemdescription']."' name='itemdescriptionval' />";
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['gender'] . "</td>";
          echo "<td>" . $row['type'] . "</td>";
          echo "<td>" . $row['itemname'] . "</td>";
          echo "<td>" . $row['itemprice'] . "</td>";
          echo "<td>" . $row['itemdescription'] . "</td>";
          echo "<td><input type='submit' name='load' value='Load' class='btn btn-danger' /></td>";
          echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
          echo "</tr>";
          echo "</form>";
        }

        ?>

      
      </tbody>
    </table>
  </div>

  <div class="container">
	  <form action="Items.php" method="post">
      <div class="row">
        <div class="col-25">
          <label for="name">Item Name</label>
        </div>
        <div class="col-75">
        <input type="text" id="itemid" name="itemid" value="<?php echo $_POST['itemid'] ?>" placeholder="Item Name.." hidden>

          <input type="text" id="itemnameup" name="itemnameup" value="<?php echo $_POST['itemnameval'] ?>" placeholder="Item Name..">
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="price">Price</label>
        </div>
        <div class="col-75">

          <input type="text" id="itempriceup" name="itempriceup" value="<?php echo $_POST['itempriceval'] ?>" placeholder="Price.." >
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="gender">Item for</label>
        </div>
        <div class="col-75">

          <input type="text" id="genderView" name="genderup" value="<?php echo $_POST['genderval'] ?>" placeholder="Item for.." >
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="type">Type</label>
        </div>
        <div class="col-75">

          <input type="text" id="typeup" name="typeup" value="<?php echo $_POST['typeval'] ?>" placeholder="Type.." >
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="contact">Contact Details</label>
        </div>
        <div class="col-75">

          <input type="text" id="contactdetailsup" name="contactdetailsup" value="<?php echo $_POST['contactdetailsval'] ?>" placeholder="Contact Details.." >
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="description">Description</label>
        </div>
        <div class="col-75">

          <input type="text" id="itemdescriptionup" name="itemdescriptionup" value="<?php echo $_POST['itemdescriptionval'] ?>" placeholder="Description.." >
        </div> 
      </div>

      <div class="row">
			  <input type="submit" name="update" value="Update">
		  </div>

      <div>
                      <?php

                        if(isset($_POST['update'])){

                          $id = $_POST['itemid'];
                          $itemnameup = $_POST['itemnameup'];
                          $itempriceup = $_POST['itempriceup'];
                          $genderup = $_POST['genderup'];
                          $typeup = $_POST['typeup'];
                          $itemdescriptionup = $_POST['itemdescriptionup'];
                          
                          $sql = "UPDATE items SET itemname = '$itemnameup', itemprice = '$itempriceup' ,gender= '$genderup', type = '$typeup', itemdescription = '$itemdescriptionup'  WHERE id= '$id'";
                          echo $sql;
                          if($conn->query($sql) === TRUE){
                      
                            echo "<div class='alert alert-success'>Item updated Successfully</div>";
                            echo("<meta http-equiv='refresh' content='1'>");
    

                         } else {
                          echo "<div class='alert alert-success'>Item updated failed</div>";
                         }

                        }

                      ?>

                    </div>

      </form>
    </div>
  <script>
      var info = JSON.parse(localStorage.getItem('info'));
      console.log(info);


      // function showData() { 
      //   var contact = document.getElementById('contactView'); 
      //   var name = document.getElementById('nameView');
      //   var price = document.getElementById('priceView');
      //   var gender = document.getElementById('genderView');
      //   var description = document.getElementById('descriptionView');
      //   var type = document.getElementById('typeView');

      //   contact.value = info.contact; 
      //   name.value = info.name;
      //   price.value = info.price; 
      //   gender.value = info.gender;
      //   description.value = info.description;
      //   type.value = info.type;
      // } 

      // showData();
    </script>
</body>

</html>