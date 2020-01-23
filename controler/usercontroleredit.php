
<?php
require('dbconn.php');
session_start();
// If form submitted, insert values into the database.
$id = $_POST['idget'];
$name = $_POST['name-input'];
$email = $_POST['email-input'];
$gender = $_POST['select-gender'];
$phone = $_POST['phone-input'];
$passportno = $_POST['passportno-input'];
$profile = basename($_FILES["profile-input"]["name"]);
$visa = basename($_FILES["visa-input"]["name"]);
$passport = basename($_FILES["passport-input"]["name"]);
$zira = basename($_FILES["zira-input"]["name"]);
$target = "../upload/profile/";
$target2 = "../upload/visa/";
$target3 = "../upload/passport/";
$target4 = "../upload/zira/";

$newprofile = $target.basename($_FILES["profile-input"]["name"]);
$newvisa = $target2.basename($_FILES["visa-input"]["name"]);  
$newpassport =$target3.basename($_FILES["passport-input"]["name"]);
$newzira = $target4.basename($_FILES["zira-input"]["name"]);

$profile_type = pathinfo($newprofile,PATHINFO_EXTENSION);
$visa_type = pathinfo($newvisa,PATHINFO_EXTENSION);
$passport_type = pathinfo($newpassport,PATHINFO_EXTENSION);
$zira_type = pathinfo($newzira,PATHINFO_EXTENSION);
    if($profile_type!='jpg' && $profile_type!='JPG' && $profile_type!='png' && $profile_type!='PNG' && $profile_type!='pdf'){
        $_SESSION['user_message1'] ="Allowed type jpg,png,pdf";
        header("location: ../formedit.php?id=$id;");
    }else
    	if($visa_type!='jpg' && $visa_type!='JPG' && $visa_type!='png' && $visa_type!='PNG' && $visa_type!='pdf'){
        $_SESSION['user_message2'] ="Allowed type jpg,png,pdf";
        header("location: ../formedit.php?id=$id;");
    }else
    if($passport_type!='jpg' && $passport_type!='JPG' && $passport_type!='png' && $passport_type!='PNG' && $passport_type!='pdf'){
        $_SESSION['user_message3'] ="Allowed type jpg,png,pdf";
        header("location: ../formedit.php?id=$id;");
    }else
    if($zira_type!='jpg' && $zira_type!='JPG' && $zira_type!='png' && $zira_type!='PNG' && $zira_type!='pdf'){
       $_SESSION['user_message4'] ="Allowed type jpg,png,pdf";
       header("location: ../formedit.php?id=$id;");
    }else

    if (move_uploaded_file($_FILES["profile-input"]["tmp_name"], $newprofile)) {
                    if(move_uploaded_file($_FILES["visa-input"]["tmp_name"], $newvisa)){
                    	if(move_uploaded_file($_FILES["passport-input"]["tmp_name"], $newpassport)){
                    		if(move_uploaded_file($_FILES["zira-input"]["tmp_name"], $newzira)){

                    $sql = "UPDATE user set name = '$name', email = '$email', gender = '$gender' , phone = '$phone',passportno = '$passportno',visa = '$visa' ,passport = '$passport',profile = '$profile',zira = '$zira' where id = $id";
                
                    $result = mysqli_query($connection, $sql);
                    if($result){
                        $message = "upload successful";
                         header("location: ../home.php");
                    }else{
                       // $message = "upload failed1";
                        $_SESSION['user_message'] = "upload failed";
                         header("location: ../formedit.php?id=$id");
                    }
                    } 
                    }
                    }      
            }else{
                $message = "upload failed";
                header("location: ../formedit.php?id=$id");
            }
        
   

// Display status message


?>