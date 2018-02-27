<?php
include 'connect_db.php';

if(isset($_GET['bin_id']) && isset($_GET['bin_status']) && isset($_GET['bin_level']) && isset($_GET['bin_location']))
{
  //fetching data from URL sent by NodeMcu
  $bin_id = $_GET['bin_id'];
  $bin_status = $_GET['bin_status'];
  $bin_level = $_GET['bin_level'];
  $bin_location = $_GET['bin_location'];

  $sql = "SELECT * FROM bin WHERE bin_id = '$bin_id'";
  $response = mysqli_query($connection,$sql);
  $num_rows = mysqli_num_rows($response);

  if($num_rows == 0)
  {
    $sql = "INSERT INTO bin (bin_status,bin_level,bin_location) VALUES('$bin_status','$bin_level','$bin_location')";
    $response = mysqli_query($connection,$sql);
  }

  $sql = "UPDATE bin SET bin_id = '$bin_id',bin_status = '$bin_status',bin_level = '$bin_level' WHERE bin_id = '$bin_id'";
  $result = mysqli_query($connection,$sql);
  if($result)
  {
   // echo "successfully updated";
  }
}
//http://localhost/bin_IOT/update_bin.php/?bin_id=1&bin_status=1&bin_level=20&bin_location=3
 ?>
