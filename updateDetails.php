 
 <?php
 echo ' <html> <style>
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
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
</style>';
 $id = $_POST['patient_id'];
 $servername = "localhost";
 $username = 'root';
$dbname = "hospitalmanagementsystem";
$id = $_POST['patient_id'];
$patient_name= $_POST['patient_name'];
$patient_bg = $_POST['patient_bg'];
$patient_age = $_POST['patient_age'];
//$conn = mysqli_connect($servername, $username,'', $dbname);
//$sql = " delete from appointment_detail where appointment_id = $id ";
 echo "
 <form action='./updatePatientDetails.php' method='post'>
 <div class='container'>
      <p>Update your details</p>
      <hr>
	  <label><b>Name</b></label>
	  <input type='hidden' name='patient_id' value = ' ". $id ." '>
      <input type='text'  value = ' ". $patient_name ." ' name='name' required>
	  
	   <label><b>Age</b></label>
      <input type='text'  value = ' ". $patient_age ." ' name='age' required>
	     <label><b>Enter blood group</b></label>
      <input type='text' value = ' ". $patient_bg ." ' name='bloodgroup' required>

      <div class='clearfix'>
        <button type='submit' >Submit</button>
      </div>
    </div> 
	</form>"
	?>