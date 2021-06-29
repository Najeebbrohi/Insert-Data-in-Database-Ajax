<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>

	<div class="container">
		<h3 class="text-center">Insert Data in database</h3>
		<div class="col-lg-6 m-auto">
			<form action="data.php" method="POST" id="myForm">
				<div class="form-group">
					<label>Time In</label>
					<input type="datetime-local" name="timein" class="form-control">
					<label>Time In</label>
					<input type="datetime-local" name="timeout" class="form-control">
					<label>Time In</label>
					<input type="text" name="remarks" class="form-control">
				</div>
				<input type="submit" name="TimeIn" id="TimeIn" class="btn btn-primary" value="Time In">
				<input type="submit" name="TimeOut" id="TimeOut" class="btn btn-success" value="Time Out">
			</form>

			<div id="result"></div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" /></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" /></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" /></script>

	<script>
		$(document).ready(function(){
			var form = $('#myForm');

			$('#TimeIn').click(function(){
				$.ajax({
					url: form.attr('action'),
					type: 'POST',
					data: $('#myform input').serialize(),
					success:function(data){
						$('#result').html(data);
					}
				})
			});

			$('#TimeOut').click(function(){
				$.ajax({
					url: form.attr('action'),
					type: 'POST',
					data: $('#myform input').serialize(),
					success:function(data){
						$('#result').html(data);
					}
				})
			});
		})
	</script>
</body>
</html>

<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'insertajax');

extract($_POST);

$select = mysqli_query($con ,"SELECT * FROM attendance");

?>
<table class="table table-shapped">

	<tr>
		<th>Id</th>
		<th>Time In</th>
		<th>Time Out</th>
		<th>Remarks</th>
	</tr>



<?php

while($row = mysqli_fetch_assoc($select)){
	?>
	<tr>
		<td><?php echo $row['id'];?></td>
		<td><?php echo $row['timein'];?></td>
		<td><?php echo $row['timeout'];?></td>
		<td><?php echo $row['remarks'];?></td>
	</tr>
	
	<?php
}

?>
</table>