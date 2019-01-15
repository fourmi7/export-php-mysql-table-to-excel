<?php 

	//conneccion  con la base de datos;
	$connect = mysqli_connect("localhost", "root", "", "z");
	$query   = "SELECT * FROM users";
	$result  = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>export a excel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<br>
		<div class="table-responsive">
			<h2>Exportar a exel</h2>
			<div class="table-responsive" id="employee_table">
			<table class="table table-bordered">
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
				</tr>
					<?php while ($row = mysqli_fetch_array($result)) {?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
						</tr>
					<?php } ?>
			</table>
		</div>
		<form action="excel.php" method="post">
			<input type="submit" name="export" class="btn btn-success" value="Exportar a excel">
		</form>
		</div>
	</div>
</body>
</html>