<?php
 session_start();
 $userid = $_SESSION['id'];
 //echo $patient_id;
 $doctor_id = $_SESSION['doctor_id'];
 $doctor_name= $_POST['doctor'];
 $servername = "127.0.0.1";
 $username = 'root';
 $password = '';
 $dbname = "hospitalmanagementsystem";
 $slot = $_POST['slot'];
 $reason = $_POST['reason'];
// echo $slot;
 $conn = mysqli_connect($servername, $username,'', $dbname);
 $sql = "select * from patient where id = $userid ";
 //echo $sql;
 $result = mysqli_query($conn, $sql);
 //$row = mysqli_fetch_assoc($result);
 $patient_id = null;
 $patient_name= null;
 while($row = mysqli_fetch_assoc($result)) {
	 $patient_id = $row['patient_id'];
	 //echo $row['patient_name'];
	 $patient_name=$row['patient_name'];
 }
 $booking_ref_id =time() . rand(10*45, 100*98);
  $date = date("Y-m-d");
 if($slot == "morning")
 {
	 $timeref = $date .' '. '9:00:00';
	// echo $timeref;
 }
  if($slot == "afternoon")
 {
	 $timeref = $date .' '. '12:00:00';
	 //echo $timeref;
 }
  if($slot == "evening")
 {
	 $timeref = $date .' '. '16:00:00';
	// echo $timeref;
 }
 $sql = " INSERT INTO appointment_detail( doctor_id, patient_id,appointment_time, booking_ref, reason) VALUES ($doctor_id,$patient_id,'$timeref','$booking_ref_id','$reason')";
//echo $sql;
 if(mysqli_query($conn, $sql)) {
	 echo " Your appointment has been booked successfully , Please note your booking reference id ";
	 echo $booking_ref_id;
	 echo " Now go back and check your scheduled appointments ";
 }
?>