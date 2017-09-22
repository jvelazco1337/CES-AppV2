<!DOCTYPE html>
<html>
<head>
	<title>CES Application V2</title>

	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/cyborg/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

	<script>
		$(function()
		{
			$("#my_form").validate(
			{
				rules: 
				{
					firstname: {
						required: true
					},
					lastname: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
				}
			});
		});
	</script>

	<style>

	body {
    		text-align: center;
    		padding-bottom: 200px;
    	}
    	h4{
    		font-size: 20px;
    	}
		.mynavbar .nav {
			float:none;
		}
		.mynavbar .nav li {
			display:inline-block;
			float:none;
			margin:0 20px;
			vertical-align:middle;
		}
		.mynavbar .nav li a:hover {
			background:red
		}
		.mynavbar .nav li.mylogo a, .mynavbar .nav li.mylogo a:hover {
			background:transparent;
			max-width:150px;
		}
		th{
    		text-align: center;
		}
		
		
	</style>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
				<div class="container"> 
				<div class="collapse navbar-collapse mynavbar" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav ">
										<li class="mylogo"><a href="http://localhost/CES-App/"><img src="https://d2oc0ihd6a5bt.cloudfront.net/wp-content/uploads/sites/1724/2016/04/CES_Logo_R1.png" alt="Logo"></a></li>
									
								</ul>
						</div> 
				</div>		
		</nav>

	<br>

	<h2><center>CES Application V2</center></h1><br><br>

	<div id="form">
	<?php echo form_open('submit_controller', array('id'=> 'my_form')); 

	if (isset($message))
	{
	?>

	<center>Data Inserted Succesfully</center><br>
	<?php } ?>

	<?php echo form_label('Firstname:'); ?> 
	<?php echo form_error('firstname'); ?><br>
	<?php echo form_input(array('id' => 'firstname', 'name' => 'firstname')); ?><br><br>

	<?php echo form_label('Lastname:'); ?> 
	<?php echo form_error('lastname'); ?><br>
	<?php echo form_input(array('id' => 'lastname', 'name' => 'lastname')); ?><br><br>

	<?php echo form_label('Email:'); ?> 
	<?php echo form_error('email'); ?><br>
	<?php echo form_input(array('id' => 'email', 'name' => 'email')); ?><br><br>

	<!-- month select, values assigned for DB -->
	<?php echo form_label('Date of Birth:'); ?> 
	<select id="month" name="month" >
		<option>Month</option>
		<option value="1">Jan</option>
		<option value="2">Feb</option>
		<option value="3">Mar</option>
		<option value="4">Apr</option>
		<option value="5">May</option>
		<option value="6">Jun</option>
		<option value="7">Jul</option>
		<option value="8">Aug</option>
		<option value="9">Sep</option>
		<option value="10">Oct</option>
		<option value="11">Nov</option>
		<option value="12">Dec</option>
	</select>

	<!-- day select with loop -->
	<select id="day" name="day">
		<option>Day</option>
		<?php
		for($i=1;$i<=31;$i++)
		{
		    echo '<option value='.$i.'>'.$i.'</option>';
		}
	?>
	</select>

	<!-- year select with loop-->
	<select id="year" name="year">
		<option>Year</option>
		<?php
			for($i=1920;$i<=2017;$i++)
			{
			    echo '<option value='.$i.'>'.$i.'</option>';
			}
		?>					
	</select><br><br>

	<?php echo form_label('Favorite Color:'); ?> 
	<input id="favcolor" type="color" name="favcolor" value=""><br><br>

	<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
	
	<?php echo form_close(); ?><br>

	</div>

	<?php $this->load->model('submit_model');?>


	<h3><center>Database Table</center></h2>

	<div id="db_table">
		<table border="1" style="margin: 20px auto; width:50%; size: 200px">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Date of Birth</th>
					<th>Favorite Color</th>
				</tr>
			</thead>
			
			<tbody>
				<?php

				$query = $this->db->query('SELECT id, firstname, lastname, email, dob, favcolor FROM User');

				if($query->result() > 0)
				{
					foreach ($query->result() as $row) 
					{
				?>		<tr >
							<td><?php echo $row->id; ?></td>	
							<td><?php echo $row->firstname; ?></td>	
							<td><?php echo $row->lastname; ?></td>	
							<td><?php echo $row->email; ?></td>	
							<td><?php echo $row->dob; ?></td>
							<td style="background-color: <?php echo $row->favcolor; ?>"></td>
								
						</tr>
				<?php  
					}
				}
				else
				{
				?>
					<tr>
						<td colspan="6">No Information Found.</td>
					</tr>
				<?php 		
				}
				?>
			</tbody>
		</table>
	</div> 

</body>
</html>