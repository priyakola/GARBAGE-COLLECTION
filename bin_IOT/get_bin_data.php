<?php
include 'connect_db.php';

if(isset($_GET['bot_location']) && isset($_GET['bot_status']) && isset($_GET['bot_id']) && isset($_GET['bot_level']))
{
  //fetching data from URL sent by NodeMcu
  $bot_location = $_GET['bot_location'];
  $bot_status = $_GET['bot_status'];
  $bot_id = $_GET['bot_id'];
  $bot_level = $_GET['bot_level'];

  $sql = "SELECT * FROM bot WHERE bot_id = '$bot_id'";
  $response = mysqli_query($connection,$sql);
  $num_rows = mysqli_num_rows($response);

  if($num_rows == 0)
  {
    $sql = "INSERT INTO bot (bot_status,bot_level,bot_location) VALUES('$bot_status','$bot_level','$bot_location')";
    $response = mysqli_query($connection,$sql);
  }

  $sql = "UPDATE bot SET bot_location = '$bot_location',bot_status = '$bot_status',bot_level = '$bot_level' WHERE bot_id = '$bot_id'";
  $result = mysqli_query($connection,$sql);
  if($result)
  {
  //  echo "successfully updated";
  }

  $sql = "SELECT * FROM bin WHERE bin_status = '1'";
  $response = mysqli_query($connection,$sql);
  while($row = mysqli_fetch_assoc($response))
  {
    echo "#";
    echo $row['bin_location'];
  }
  echo "#";

}
//http://localhost/bin_IOT/get_bin_data.php/?bot_id=1&bot_status=0&bot_level=20&bot_location=3
 ?>
