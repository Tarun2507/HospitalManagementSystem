
<?php
session_start();
echo '
<html>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 15%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

.cancelbtn, .signupbtn {
  float: left;
}
.container {
  padding: 16px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
</style> ';
echo '
<form action="./bookAppointment.php" id="formid" method ="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Appointment details</h1>
    <hr>

    <label><b>Select the doctor you want to consult</b></label> <br>';	
 $servername = "127.0.0.1";
$username = 'root';
$dbname = "hospitalmanagementsystem";
$conn = mysqli_connect($servername, $username,'', $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "Select * from doctor";
if (mysqli_query($conn, $sql)) {
	echo "<br>  <select form='formid'  name='doctor' style= 'height: 5%;
    width: 25%;'> ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
	  $id = $row['doctor_id'];
	  echo $id;
	  $_SESSION['doctor_id'] = $id;
	  $name = $row['doctor_name']; 
	  $_SESSION['name'] = $row['name'];
	  //echo $row['name'];	
	  echo '<option value="'.$name.'">'.$name.'</option>';	
  }
} else {
  echo "0 results";
}
}
echo " </select> ";
echo "<br> <br>";
echo ' <label> <b> Reason for the appointment</label>';
echo '<br> <br> <input type="text" placeholder="Enter reason" name="reason" required style="width: 25%;height:5%"> ';
echo ' <br><label> <b> Book slot <br></label>';
echo "<br>  <select form='formid'  name='slot' style= 'height: 5%;
    width: 25%;'> ";
echo '<option value="morning">Morning(8:00am-11pm)</option>';
echo '<option value="afternoon">Afternoon(12:00am-2pm)</option>';
echo '<option value="evening">Evening(2pm-4pm)</option>';
echo ' </select> <br>';
echo '<button type="submit" style="margin-left : 2px;margin-top :18px" >Book</button> ';
echo '</form>';;
?>