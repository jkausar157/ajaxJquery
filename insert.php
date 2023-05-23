<?php
include('dbconnect.php');
// stripslashes function can be used to clean up data retrieved from a database or from an HTML form. optional

// php ://input - This is a read-only stream that allows us to read raw data from the request body.It returns all the raw data after the HTTP - headers of the request , regardless of the content type 

// json_decode - It takes JSON string and converts it into a PHP object or array , if true then associative array

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
$name = $mydata['name'];
$email = $mydata['email'];
$password = $mydata['password'];

//insert data

// if(!empty($name)  && !empty($email) && !empty($password)){
//       $sql = "INSERT INTO student(name, email, password) VALUES('$name', '$email', '$password')";
//       if($con-> query($sql) == TRUE){
//         echo "student saved successfully";
//       }else{
//         echo "unable to save student";
//         }
// }else{
//     echo "Fill all fields";
// }

if(!empty($name) && !empty($email) && !empty($password)){
    $sql= "INSERT INTO student(id,name,email,password) VALUES ('$id','$name','$email','$password') ON DUPLICATE KEY UPDATE name='$name',email='$name',password='$password'";


    // $result=mysqli_query($db,$sql);
    if($con->query($sql)== TRUE){
        echo "Student Saved Successfully";

    }else{
        echo "Unable to save Data";
    }

}else{
    echo "Fill All Fields";
}
?>