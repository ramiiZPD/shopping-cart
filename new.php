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

	<link rel="stylesheet" type="text/css" href="css/style.css"/> 
	<script src="js/index.js"></script>
</head>
<body>

	<h2><center>ADD ITEMS</center></h2>

	<div class="row">
  <div class="col-sm-6" >
    <a style="padding-left: 30px;color:red" href="new1.php">Direct to Item List</a>
	</div>
</div>
	
	<div class="container">
	  <form action="new.php" method="post" enctype='multipart/form-data'>
		<div class="row">
			<div class="col-25">
			  <label for="gender">Item For</label>
			</div>
			<div class="col-75">
			  <select id="gender" name="gender">
				<option value="choose" selected="true" disabled="disabled">Choose a gender</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			  </select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
			  <label for="type">Item Type</label>
			</div>
			<div class="col-75">
			  <select id="type" name="type">
					<option value="type" selected="true" disabled="disabled">Choose a type</option>
					<option value="clothing">Clothing</option>
					<option value="shoes">Shoes</option>
					<option value="watch">Watch</option>
					<option value="jewalary">Jewalary</option>
					<option value="handbag">Handbag</option>
					<option value="accessories">Accessories</option>
			  </select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
			  <label for="lname">Item Name</label>
			</div>
			<div class="col-75">
			  <input type="text" id="name" name="itemname" placeholder="Item Name..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
			  <label for="lname">Item Price</label>
			</div>
			<div class="col-75">
			  <input type="text" id="price" name="itemprice" placeholder="Item Price..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
			  <label for="lname">Contact Details</label>
			</div>
			<div class="col-75">
			  <input type="text" name="contactdetails" id="contact" maxlength="10" placeholder="Contact Details..">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
			  <label for="lname">Item Photo</label>
			</div>
			<div class="col-75">
				<input type="file" name="file">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="subject">Item Description</label>
			</div>
			<div class="col-75">
				<textarea id="description" name="itemdescription" placeholder="Write something.." style="height:200px"></textarea>
			</div>
		</div>

		<div class="row">
			<input type="submit" name="create" value="Add Item">
		</div>

		<div>
											<?php

                        if(isset($_POST['create'])) {
                          $errors = 0;

                          $gender = $_POST['gender'];
                          $type = $_POST['type'];
                          $itemname = $_POST['itemname'];
                          $itemprice = $_POST['itemprice'];
                          $contactdetails = $_POST['contactdetails'];
													$itemdescription = $_POST['itemdescription'];

													$fileName       = $_FILES['file']['name'];  
													$temp_name  = $_FILES['file']['tmp_name'];  
													if(isset($fileName)){
															$location = 'uploads/';      
															if(move_uploaded_file($temp_name, $location.$fileName)){
																	// echo 'File uploaded successfully';
															}
													} 

                          if($errors == 0) {
                            $query = "INSERT INTO items (gender, type, itemname, itemprice, contactdetails, itemdescription, uploadfilepath) 
                            VALUES('$gender', '$type', '$itemname', '$itemprice', '$contactdetails', '$itemdescription', '$fileName')";
                           
                            if(mysqli_query($conn, $query)) {
															echo "<div class='alert alert-success'>Record Added Successfully</div>";

														} else {
															echo "Error: " . $sql . "" . mysqli_error($conn);
														};

														mysqli_close($conn);
                            
                          }
                          
                        }


                        
                      ?>
      </div>


	  </form>
	  
	</div>
	</body>
</html> 