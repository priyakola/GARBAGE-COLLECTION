<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<style>
   
   html,body {
  padding:0;
  margin:0;
  height:100%;
  min-height:100%;
 }

.quarter{
  width:25%;
  height:100%;
  float:left;
}
.contents{
  height:50%;
  width:100%;
}
   
</style>
<body style="overflow-x:hidden" >

<?php 
	include 'xtra.php';
	?>
<header > <center>
    <img src="gvp.png" width="100" height="100" style="float:left; margin-left:1%; margin-top:1%;visibility:show">
  <h1 color="#F9EBEA" ><i font-size="25px" style="float:center; text-align:left;margin-left:-10%;" >IOT-AUTONOMOUS GARBAGE / PACKAGE CARRIER SYSTEM</i></h1></center>
	<p style="float:right; text-align:right;margin-right:10%; margin-top:-1% ;color:#F1C40F  ;">--TCS REMOTE INTERNSHIP PROJECT<p>
	<img src="logoo.jpg" width="100" height="100" style="float:right; margin-right:-28%; margin-top:-5%;visibility:show">
</header>
<br>
<br>

<div class="contents">

<div class="col-md-6 quarter" style="background-color:#F9EBEA; margin:auto;">

<span style="height:20%; width: 200px; font-size:20px;"> BIN ID&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[0][0];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN STATUS&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[0][1];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN LEVEL&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[0][2];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN LOCATION&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[0][3];?></span><br>

<?php if($bin[0][3]==$bot[0][3])
{
	echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;visibility:show">';
	}
	else
	{
		echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;display: none;" ">';
		}
?>
</div>
<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<div class="container" style="float:left; margin-left:15%; margin-top:5%;visibility:show">
<div class="progress vertical">
  <div class="progress-bar progress-bar-<?php echo level($bin[0][2]);?>"  role="progressbar"  aria-valuemax="32" style="width: <?php echo $bin[0][2]; ?>%;" >
  </div> 
  </div>
</div>

</div>

<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<span style="height:20%; width: 200px; font-size:20px;"> BIN ID&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[1][0];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN STATUS&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[1][1];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN LEVEL&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[1][2];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN LOCATION&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[1][3];?></span><br>
<?php if($bin[1][3]==$bot[0][3])
{
	echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;visibility:show">';
	}
	else
	{
		echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;display: none;" ">';
		}
?>
</div>

<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<div class="container" style="float:left; margin-left:15%; margin-top:5%;visibility:show">
<div class="progress vertical">
  <div class="progress-bar progress-bar-<?php echo level($bin[1][2]);?>" role="progressbar"  aria-valuemax="32" style="width: <?php echo $bin[1][2]?>%; float:center;">
  </div> 
  </div>
</div>
</div>

<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<span style="height:20%; width: 200px; font-size:20px;"> BIN ID&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[2][0];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN STATUS&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[2][1];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN LEVEL&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[2][2];?></span><br>
<span style="height:20%; width: 200px; font-size:20px;"> BIN LOCATION&&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[2][3];?></span><br>
<?php if($bin[2][3]==$bot[0][3])
{
	echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;visibility:show">';
	}
	else
	{
		echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;display: none;" ">';
		}
?>
</div>


<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<div class="container" style="float:left; margin-left:15%; margin-top:5%;visibility:show">
<div class="progress vertical">
  <div class="progress-bar progress-bar-<?php echo level($bin[2][2]);?>" role="progressbar"  aria-valuemax="32" style="width: <?php echo $bin[2][2];?>%; float:center;">
  </div> 
  </div>
</div>
</div>

<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<span > BIN ID&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[3][0];?></span><br>
<span > BIN STATUS&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[3][1];?></span><br>
<span > BIN LEVEL&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[3][2];?></span><br>
<span > BIN LOCATION&ensp;&ensp;&ensp;&ensp;&ensp;<?php echo $bin[3][3];?></span><br>
<?php if($bin[3][3]==$bot[0][3])
{
	echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;visibility:show">';
	}
	else
	{
		echo '<img src="robot.png" width="150" height="150" style="float:center; margin-left:15%; margin-top:10%;display: none;" ">';
		}
?>
</div>


<div class="col-md-6 quarter" style="background-color:#F9EBEA;">
<div class="container" style="float:left; margin-left:15%; margin-top:5%;visibility:show">
<div class="progress vertical">
  <div class="progress-bar progress-bar-<?php echo level($bin[3][2]);?>" role="progressbar"  aria-valuemax="32" style="width: <?php echo $bin[3][2];?>%; float:center;">
  </div> 
  </div>
</div>
</div>

<div class="row">
  <div class="column" style="background-color:#F9EBEA;">
    <h2>GARBAGE BIN </h2>
		<table>
        <thead>
            <tr>
                <th>bin_id</th>
				<th>bin_status</th>
				<th>bin_level</th>
				<th>bin_location</th>
               
            </tr>
        </thead>
        <tbody>
   <?php

for ($row = 0; $row < $n; $row++) {
echo '</tr>';
  for ($col = 0; $col < 4; $col++) {
  
  echo "<td>".$bin[$row][$col]."</td>";
 
  }
echo '<tr>';
}
?>
</tbody>
</table>
  </div>
  <div class="column" style="background-color:#F9EBEA;">
    <h2 font-size="20px">GARBAGE COLLECTOR </h2>
	<table >
        <thead>
            <tr>
                <th>bot_id</th>
				<th>bot_status</th>
				<th>bot_level</th>
				<th>bot_location</th>
               
            </tr>
        </thead>
        <tbody>
    <?php

for ($row2 = 0; $row2 < $i; $row2++) {
echo '</tr>';
  for ($col2 = 0; $col2 < 4; $col2++) {
  
  echo "<td>".$bot[$row2][$col2]."</td>";
 
  }
echo '<tr>';
}
mysqli_close($connection);
	?>
	</tbody>
</table>;
  </div>
</div>




</div>

</div>
<footer color:black><center>@TCS REMOTE INTERNSHIP</footer>
</body>
</html>