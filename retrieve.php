<?php 
// <!-- ====================mysql==============Start============ -->
  include 'dbconnect.php';
  //Retrive Student Data
  $sql= "SELECT * FROM student";
  $result=$con->query($sql);
  if($result->num_rows>0){
    $data =array();
    while($row =$result->fetch_assoc()){
        $data[]=$row;
    }
  }

   //Returning JSON Formate Data as Response to ajax call
    echo  json_encode($data);

?>