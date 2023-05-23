<?php 
      include('dbconnect.php');

      $data=stripslashes(file_get_contents("php://input"));
      $mydata=json_decode($data,true);
   
      $id =$mydata['sid'];

    //   Retrive Data with specific id
    $sql= "SELECT *FROM student WHERE id={$id}";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();

    //Returning JSON Formate DATA as Response to Ajax Call
    echo json_encode($row);
    


?>