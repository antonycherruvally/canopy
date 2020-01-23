
<?php
require('dbconn.php');
session_start();
// If form submitted, insert values into the database.
$username = $_POST['user'];
$password = $_POST['password'];
$pass = md5($password);


// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `login` WHERE user='$username' and password='$pass'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if($count == 1) {
         
         $_SESSION['login_user'] = $username;
         
         header("location: ../home.php");
      }else {
      	$_SESSION['loginerror'] = 'Invalid username and password';
         header("location: ../index.php");
      }

?>