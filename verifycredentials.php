
<?php
session_start();
$servername = "127.0.0.1";
$username = 'root';
$password = '';
$dbname = "hospitalmanagementsystem";
$email = $_POST['email'];
$password = $_POST['password'];
//$age = $_POST['age'];

$conn = mysqli_connect($servername, $username,'', $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = " select * from user where email = '$email' and password = '$password' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	$_SESSION['id'] = $row['id'];
	echo $row['type'];
	//$_SESSION['type'] = $_row['type'];
	if($row['type'] == 'patient') {
	//$_SESSION['patient_name'] = $row['name'];
	header('Location:patient_profile.php');
	}
	else {
		//$_SESSION['patient_name'] = $row['patient_name'];
	    header('Location:doctor_profile.php');
	}
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>