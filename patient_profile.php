<?php
session_start();
$servername = "127.0.0.1";
 $username = 'root';
 $password = '';
 $dbname = "hospitalmanagementsystem";
 $conn = mysqli_connect($servername, $username,'', $dbname);
  $userid = $_SESSION['id'];
 $sql = "select * from patient where id = $userid ";
 //echo $sql;
 $result = mysqli_query($conn, $sql);

 //$row = mysqli_fetch_assoc($result);
 while($row = mysqli_fetch_assoc($result)) {
	 $patient_id = $row['patient_id'];
	 //echo $patient_id;
	 $patient_name = $row['patient_name'];
	 $patient_bg = $row['bloodgroup'];
	 $patient_age = $row['age'];
 }
echo '  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> ';
echo ' <body style="margin : 0px"> </body> ';
echo ' <div style="display:flex ; flex : 1;height:48px;background-color: #00009f;justify-content : center;align-items:center"> 
    <div style="display:flex; color: #ffff;font-size: 25px;"> AayushDoc </div> </div>';
	echo ' <marquee Scrollamount = 10 direction="left"> ';
	echo ' Welcome ' ;
	echo $patient_name;
	echo ' </marquee> ' ;
echo ' <div style="display:flex;justify-content:center;align-items:center;margin-top:5%;font-size:20px;"> Your upcoming appointments  </div>';
echo "<table class='table table-bordered' border='1' style='margin-left :2px';>
<tr>
<th>Patient id</th>
<th>Patient name</th>
<th> Consultant doctor </th>
<th> Age </th>
<th> Blood group </th>
<th> Appointment time </th>
<th> Reason </th>
<th> Cancel appointment </th>
</tr>";
$sql = "select * from appointment_detail where patient_id = $patient_id ";
 $result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['patient_id'] . "</td>";
echo "<td>" .  $patient_name . "</td>";
$doctor_id = $row['doctor_id'];
$sql = "select * from doctor where doctor_id = $doctor_id"; 
$result2 = mysqli_query($conn, $sql);
  while($row2 = mysqli_fetch_assoc($result2)) {
	$doctor_name = $row2['doctor_name'];
 }
echo "<td>" . $doctor_name . "</td>";
echo "<td>" . $patient_age . "</td>";
echo "<td>" . $patient_bg . "</td>";
echo "<td>" . $row['appointment_time'] . "</td>";
echo "<td>" . $row['reason'] . "</td>";
echo " <td> ";
echo " 
			<form action='./deleteAppointment.php' method='post'>
			<input type='hidden' name='appointment_id' value='".$row['appointment_id']."'> </input>
            <button type='submit'   style= ' background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;'> Cancel </button> </form>";
  echo "</td>";
  echo "</tr>";
}
echo "</table>";
echo " <div style='display:flex; justify-content : center; align-items :center'> 
			<form action='./appointmentPage.php'>
            <button type='submit'   style= ' background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;'> Book a new appointment </button> </form> </div>";
  echo " <div style='display:flex; justify-content : center; align-items :center'> 
			<form action='./updateDetails.php' method='post'>
			<input type='hidden' name='patient_id' value=' ". $patient_id ."'>
			<input type='hidden' name='patient_name' value=' ". $patient_name ."'>
			<input type='hidden' name='patient_bg' value=' ". $patient_bg ."'>
			<input type='hidden' name='patient_age' value=' ". $patient_age."'>
            <button type='submit'   style= ' background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;'> Update details </button></form> </div>";
?>	