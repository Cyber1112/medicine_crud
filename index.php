<?php

include("api/config/app.php");
include("api/user/user.php");
include("api/functions/addMedicine.php");

$user = new User();
$user_data = $user->checkLogin();
$medicine_list = $user->listMedicine($user_data['id']);

if ( is_null($user_data) ){
    header("Location: user/login.php");
    die;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>

<body>
<div class="header">
  <a href="#default" class="logo">Dose Tracker</a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="api/functions/logout.php" id="logout">Log Out</a>
  </div>
</div>
<div style="padding-left:20px">
    <h1>HELLO <?php echo $user_data['first_name'];?></h1>
</div>

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Medicine <b>Tracker</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addMedicineModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Medicine</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Name</th>
                        <th>Medicine</th>
						<th>Dosage</th>
                        <th>Frequensy</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
						while ( $data = mysqli_fetch_array($medicine_list) ){
					?>

                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?php echo $data['first_name'];?></td>
                        <td><?php echo $data['medicine_name'];?></td>
						<td><?php echo $data['dosage'];?></td>
                        <td><?php echo $data['frequency'];?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit edit_table" data-toggle="modal" data-id="<?php echo $data['id']?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete delete_row" data-toggle="modal" data-id="<?php echo $data['id']?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
					<?php }?>
				
                </tbody>
            </table>
			
    </div>
	<!-- Edit Modal HTML -->
	<div id="addMedicineModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Add Medicine</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Medicine</label>
							<input type="text" class="form-control" name="medicine_name" id="medicine_name" required>
						</div>
						<div class="form-group">
							<label>Dosage</label>
							<input type="text" class="form-control" name="dosage" id="dosage" required>
						</div>
						<div class="form-group">
							<label>Frequensy</label>
							<input type="text" class="form-control" name="frequency" id="frequency" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" id="addMedicine" name="add_medicine" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Medicine</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Medicine</label>
							<input type="text" class="form-control" name="medicine_name" id="medicine_namee" required>
						</div>
						<div class="form-group">
							<label>Dosage</label>			
							<input type="text" class="form-control" name="dosage" id="dosagee" required>
						</div>
						<div class="form-group">
							<label>Frequensy</label>
							<input type="text" class="form-control" name="frequency" id="frequencyy" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="updateMedicine" id="updateMedicine" class="btn btn-info" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Medicine</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete" id="deleteMedicine">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="assets/js/index.js"></script>
</body>
</html>