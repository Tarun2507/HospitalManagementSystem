<?php
 $servername = "localhost";
$username = 'root';
$dbname = "hospitalmanagementsystem";
$patient_id = $_POST['patient_id'];
$patient_name = $_POST['name'];
$patient_age = $_POST['age'];
$patient_bg = $_POST['bloodgroup'];
$conn = mysqli_connect($servername, $username,'', $dbname);
   $sql = "UPDATE patient
      SET patient_name='$patient_name', age = $patient_age , bloodgroup= '$patient_bg' where patient_id = $patient_id";
if (mysqli_query($conn, $sql))
{
echo " Record updated successfully, Thank you!! " ;
}
?>