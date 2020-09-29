<?php
session_start();
$servername = "127.0.0.1";
 $username = 'root';
 $password = '';
 $dbname = "hospitalmanagementsystem";
 $conn = mysqli_connect($servername, $username,'', $dbname);
  $userid = $_SESSION['id'];
 $sql = "select * from doctor where id = $userid ";
 //echo $sql;
 $result = mysqli_query($conn, $sql);

 //$row = mysqli_fetch_assoc($result);
 while($row = mysqli_fetch_assoc($result)) {
	 $doctor_id = $row['doctor_id'];
	 //echo $patient_id;
	 $doctor_name = $row['doctor_name'];
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
	echo $doctor_name;
	echo ' </marquee> ' ;
echo ' <div style="display:flex;justify-content:center;align-items:center;margin-top:5%;font-size:20px;"> Your upcoming appointments  </div>';
echo "<table class='table table-bordered' border='1' style='margin-left :2px';>
<tr>
<th>patient id</th>
<th> patient name </th>
<th> Appointment time </th>
<th> Reason </th>
</tr>";
$sql = "select * from appointment_detail where doctor_id = $doctor_id ";
 $result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['patient_id'] . "</td>";
//echo "<td>" .  $patient_name . "</td>";
$patient_id = $row['patient_id'];
$sql = "select * from patient where patient_id = $patient_id"; 
$result2 = mysqli_query($conn, $sql);
  while($row2 = mysqli_fetch_assoc($result2)) {
	$patient_name = $row2['patient_name'];
 }
echo "<td>" . $patient_name . "</td>";
echo "<td>" . $row['appointment_time'] . "</td>";
echo "<td>" . $row['reason'] . "</td>";
  echo "</tr>";
}
echo "</table>";

echo " <div style='display:flex; justify-content : center; align-items :center'> 
			<form action='./loginpage.html'>
            <button type='submit'   style= ' background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;'> Logout </button> </form> </div>";
?>	