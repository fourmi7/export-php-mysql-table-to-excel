<?php 

	//conneccion  con la base de datos;
	$connect = mysqli_connect("localhost", "root", "", "z");

	$output = '';

	if (isset($_POST['export'])) {
		$query   = "SELECT * FROM users";
		$result  = mysqli_query($connect, $query);

		if(mysqli_num_rows($result) > 0) {
			$output .= '
				<table class="table table-bordered">
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Email</th>
					</tr>
					';
					while ($row = mysqli_fetch_array($result)){
						$output .='
								<tr>
									<td> '.$row['name'].' </td>
									<td> '.$row['email'].' </td>
								</tr> 
						';
					}
			$output .='</table> ';
			header('Content-Type: application/xls');  
			header('Content-disposition: attachment; filename='.rand().'.xls');  
			echo $output;  
		}
	}

?>