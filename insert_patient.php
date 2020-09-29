
<?php
$servername = "127.0.0.1";
$username = 'root';
$dbname = "hospitalmanagementsystem";
$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];
$mobile_no = $_POST['mobilenumber'];
$blood_group = $_POST['bloodgroup'];
$name= $_POST['name'];
$conn = mysqli_connect($servername, $username,'', $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO  user(email,password,phoneno,type) VALUES('$email','$password','$mobile_no','patient')";
if (mysqli_query($conn, $sql)) {
	 $last_id = $conn->insert_id;
	 $conn2 = mysqli_connect($servername, $username,'', $dbname);
	 $sql2 = "INSERT INTO patient(id,age,patient_name,bloodgroup) VALUES($last_id ,$age,'$name','$blood_group')";
	 echo $sql2;
	 echo "hello";
	 mysqli_query($conn2,$sql2);
  echo "New record created successfully". $last_id;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
mysqli_close($conn2);
?>