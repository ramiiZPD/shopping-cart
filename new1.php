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
    <a style="padding-left: 30px;color:red" href="new.php">Direct to Item Form</a>
  </div>
  
</div>

  <div>
                      <?php

                        if( isset($_POST['update'])){

                          // $itemname = $_POST['itemname'];

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
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['gender'] . "</td>";
          echo "<td>" . $row['type'] . "</td>";
          echo "<td>" . $row['itemname'] . "</td>";
          echo "<td>" . $row['itemprice'] . "</td>";
          echo "<td>" . $row['itemdescription'] . "</td>";
          echo "<td><input type='submit' name='update' value='Update' class='btn btn-danger' /></td>";
          echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
          echo "</tr>";
          echo "</form>";
        }

        ?>

      
      </tbody>
    </table>
  </div>

  <div class="container">
	  <form>
      <div class="row">
        <div class="col-25">
          <label for="name">Item Name</label>
        </div>
        <div class="col-75">

          <input type="text" id="nameView" name="itemname" placeholder="Item Name.." disabled>
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="price">Price</label>
        </div>
        <div class="col-75">

          <input type="text" id="priceView" placeholder="Price.." disabled>
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="gender">Item for</label>
        </div>
        <div class="col-75">

          <input type="text" id="genderView" placeholder="Item for.." disabled>
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="type">Type</label>
        </div>
        <div class="col-75">

          <input type="text" id="typeView" placeholder="Type.." disabled>
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="contact">Contact Details</label>
        </div>
        <div class="col-75">

          <input type="text" id="contactView" placeholder="Contact Details.." disabled>
        </div> 
      </div>
      <div class="row">
        <div class="col-25">
          <label for="description">Description</label>
        </div>
        <div class="col-75">

          <input type="text" id="descriptionView" placeholder="Description.." disabled>
        </div> 
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