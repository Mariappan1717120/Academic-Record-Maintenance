<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
$username=$_SESSION["username"];
$sql="select roll_no from users where username='$username'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query))
{
$dbrollno=$row['roll_no'];
}
$sql="select UT1,UT2,UT3 from pqt_ut where roll_no='$dbrollno'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query))
{
$dbut1=$row['UT1'];
$dbut2=$row['UT2'];
$dbut3=$row['UT3'];
}
$sql="select AS1,AS2,AS3 from pqt_Assignment where roll_no='$dbrollno'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query))
{
$dbas1=$row['AS1'];
$dbas2=$row['AS2'];
$dbas3=$row['AS3'];
}
$sql="select TU1,TU2,TU3 from pqt_Tutorial where roll_no='$dbrollno'";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query))
{
$dbtu1=$row['TU1'];
$dbtu2=$row['TU2'];
$dbtu3=$row['TU3'];
}
$totalut=$dbut1+$dbut2+$dbut3;
$totalas=$dbas1+$dbas2+$dbas3;
$totaltu=$dbtu1+$dbtu2+$dbtu3;
$totalinternal=($totalut/5)+($totalas/3)+($totaltu/3);

?>
<html>
<head>
<title> Assignment  </title>
<style>
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}

 td, td {
  border: 1px solid #ddd;
}

tr:ntd-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

th {
  text-align: left;
  background-color: blue;
  color: white;
}
</style>

</head>
<body>
<h1 style="color:red;text-align:center">PQT Internal Mark </h1>
<br>
<body>
<div align="center" style="vertical-align:bottom">
<div align="center" style="vertical-align:bottom">
    <table  cellpadding="25">
        <tbody>
           <tr> 
		  <td>Unit Test 1</td>
          <td> <?php echo $dbut1 ?>
		  </tr>
		  <tr> 
		  <td>Unit Test 2</td>
          <td> <?php echo $dbut2 ?>
		  </tr>
		  <tr> 
		  <td>Unit Test 3</td>
          <td> <?php echo $dbut3 ?>
		  </tr>
		  <tr> 
		  <th> Total UT Mark</th>
          <th> <?php echo $totalut ?> </th>
		  </tr>
		  <tr> 
		  <td> Assignment 1</td>
          <td> <?php echo $dbas1 ?>
		  </tr>
		  <tr> 
		  <td> Assignment 2</td>
          <td> <?php echo $dbas2 ?>
		  </tr>
		  <tr> 
		  <td> Assignment 3</td>
          <td> <?php echo $dbas3 ?>
		  </tr>
		  <tr> 
		  <th> Total Assignment Mark</th>
          <th> <?php echo $totalas ?></th>
		  </tr>
		  <tr> 
		  <td> Tutorial 1</td>
          <td> <?php echo $dbtu1 ?>
		  </tr>
		  <tr> 
		  <td> Tutorial 2</td>
          <td> <?php echo $dbtu2 ?>
		  </tr>
		  <tr> 
		  <td> Tutorial 3</td>
          <td> <?php echo $dbtu3 ?>
		  </tr>
		  <tr> 
		  <th> Total Tutorial Mark</th>
          <th> <?php echo $totaltu ?></th>
		  </tr>
		  <tr color="red"> 
		  <td> Final Internal Mark </td>
          <td> <?php echo $totalinternal ?> </td>
		  </tr>
		  </tbody>
		  <table>
		  <div>
	 <body>
<html>