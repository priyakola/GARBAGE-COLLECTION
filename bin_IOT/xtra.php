<?php
include 'connect_db.php';
$sql = 'SELECT * FROM bin';
         
$query = mysqli_query($connection, $sql);
$n=mysqli_num_rows($query);
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($connection));
}
$bin = array(array());

$i=0;
         
while ($row = mysqli_fetch_assoc($query))
{
	
	$bin[$i][0] = $row['bin_id'];
	$bin[$i][1] = $row['bin_status'];
	$bin[$i][2] = round($row['bin_level'] * 10/3,2);
	$bin[$i][3] = $row['bin_location'];
		$i++;
	
}
for ($row = 0; $row < $i; $row++) {
  //echo "<p><b>bin $row</b></p>";
  //echo "<ul>";
  for ($col = 0; $col < 4; $col++) {
    //echo "<li>".$bin[$row][$col]."</li>";
  }
  //echo "</ul>";
}
$sql2 = 'SELECT * FROM bot';    
$query2 = mysqli_query($connection, $sql2);
 
if (!$query2) {
    die ('SQL Error: ' . mysqli_error($connection));
}     

$bot = array(array());

$i=0;
while ($row2 = mysqli_fetch_array($query2))
{
	
	$bot[$i][0] = $row2['bot_id'];
	$bot[$i][1] = $row2['bot_status'];
	$bot[$i][2] = $row2['bot_level'];
	$bot[$i][3] = $row2['bot_location'];
		$i++;
		
}
//echo $i;
for ($row2 = 0; $row2 < $i; $row2++) {
 // echo "<p><b>bot $row2</b></p>";

  for ($col2 = 0; $col2 < 4; $col2++) {
 //  echo "<li>".$bot[$row2][$col2]."</li>";
  }

}
	$x=0;
function level($x ){
	if( $x <=25 ){ return 'success';
}
if( $x >25 && $x<=50 ){ return 'info';
}
if( $x >50 && $x<=75  ){ return 'warning';
}
if( $x >75){ return 'danger';
}
}

?>
