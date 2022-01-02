<?php
include 'database.php';

if(count($_POST)>0){
	if($_POST['type']==1){
		$service=$_POST['service'];
		$price=$_POST['price'];
		$contactperson=$_POST['contactperson'];
		$contactno=$_POST['contactnumber'];
		$datesavailable=$_POST['dates'];
		$sql = "INSERT INTO `service`( `service`, `price`, `contact_person`, `contact_no`,`dates_available`) VALUES ('$service','$price','$contactperson','$contactno','$datesavailable')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
			
		} 
		else {
			echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==2){
		$sno=$_POST['sno'];
		$service=$_POST['service'];
		$price=$_POST['price'];
		$contactperson=$_POST['contactperson'];
		$contactno=$_POST['contactnumber'];
		$datesavailable=$_POST['dates'];
		$sql = "UPDATE `service` SET `service`='$service',`price`='$price',`contact_person`='$contactperson',`contact_no`='$contactno',`dates_available`='$datesavailable' WHERE sno=$sno";
		// echo $sql;
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==3){
		$sno=$_POST['sno'];
		$sql = "DELETE FROM `service` WHERE sno=$sno ";
		if (mysqli_query($conn, $sql)) {
			echo $sno;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$sno=$_POST['sno'];
		$sql = "DELETE FROM service WHERE sno in ($sno)";
		if (mysqli_query($conn, $sql)) {
			echo $sno;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>