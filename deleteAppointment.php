<?php
 $servername = "localhost";
$username = 'root';
$dbname = "hospitalmanagementsystem";
$id = $_POST['appointment_id'];
$conn = mysqli_connect($servername, $username,'', $dbname);
$sql = " delete from appointment_detail where appointment_id = $id ";
if (mysqli_query($conn, $sql))
{
echo " Record deleted successfully " ;
}
?>