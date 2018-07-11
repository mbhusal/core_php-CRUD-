<?php 	

session_start();

//initialization variables
$name ="";
$address = "";
$id=0;
$edit_state = false;


//connecting to database
$db = mysqli_connect('localhost','root','','core_php');


//if save button is clicked
if(isset($_POST['save'])){
	$name = $_POST['name'];
	$address = $_POST['address'];

	$query = "INSERT INTO info (name, address) VALUES('$name','$address')";
	mysqli_query($db,$query);
	$_SESSION['msg']="New Data Added.";
	header('location: index.php'); //redirecting to index.php after inserting the data.
}



//if update button is clicked
if(isset($_POST['update'])){
	$id = ($_POST['id']);
	$name = ($_POST['name']);
	$address = ($_POST['address']);
	$id = ($_POST['id']);


	$query = "UPDATE info SET name='$name', address='$address' WHERE id=$id";
	mysqli_query($db,$query);
	$_SESSION['msg']=" Data Has Been Updated.";
	header('location: index.php'); //redirecting to index.php after inserting the data.
}


//deleting the record from the database

if(isset($_GET['del'])){
	$id = $_GET['del'];
	$sql = "DELETE FROM info WHERE id = $id";
	$rec = mysqli_query($db, $sql);
	$_SESSION['msg']=" Data Has Been Deleted.";
	header('location: index.php'); //redirecting to index.php after inserting the data.

}

//retriving data from database

$results= mysqli_query($db, "SELECT * FROM info")


 ?>
