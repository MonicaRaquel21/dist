<?php
	include_once "controller/db.php";
	$sql="SELECT idestado,nombreestado from matriculaestado;"; 
	$result = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result,MYSQLI_NUM)) 
		{
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
	 }	
	mysqli_close($con); 
 ?>