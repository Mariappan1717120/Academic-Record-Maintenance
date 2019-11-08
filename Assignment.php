
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
<h1 style="color:red;text-align:center">Assignment Mark </h1>
<br>
<body>

<form action="Assignment.php" method="post">
<div align="center" style="vertical-align:bottom" >
SUBJECT
<select  name="subject">
    <option></option>
    <option>PQT_Assignment</option>
    <option>TOC_Assignment</option>
    <option>CA_Assignment</option>
    <option>DBMS_Assignment</option>
    <option>OS_Assignment</option>
	<option>DAAA_Assignment</option>
  </select><br>
 </div><br><br>
<div align="center" style="vertical-align:bottom">
<div align="center" style="vertical-align:bottom">
    <table  cellpadding="25">
        <tbody>
           <tr> 
<th scope="col">Roll no</th>
<th scope="col">Assignment Mark1</th>
<th scope="col">Assignment Mark2</th>
<th scope="col">Assignment Mark3</th>
</tr>
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
$sql = "select roll_no,fullname from users ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>
<tr> 
<td scope="row"><?php echo $row["roll_no"] ?>   <input type="hidden" name="roll_no[]" value="<?php echo $row["roll_no"] ?> " />
</td>
<td><input type="text"  id="AS1" name="AS1[]" /></td>
<td><input type="text"  id="AS2" name="AS2[]"/></td>
<td><input type="text"  id="AS3" name="AS3[]"/></td>
</tr>
<?php
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
</tbody>
    </table>
</div></div>
     
    <br/></br>
<div align="center" style="vertical-align:bottom">
    <input type="submit" name="submit" value="Save Mark" />
</div>
</form>
</body>
<html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="college";
$flag=0;
$conn = mysqli_connect($servername, $username, $password,$db);
if(isset($_POST['submit']))
{
$subject=$_POST["subject"];
	$sql1="create table $subject(roll_no int(10) ,AS1 int,AS2 int ,AS3 int);";
	if ($conn->query($sql1) === TRUE) {
    echo "";
} else {
    echo "<p align='center'> <font color=red size='6pt'>Already Upload the $subject Mark</font> </p><br/>";
}
$sql = "select roll_no,fullname from users ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		 $roll_no = $row["roll_no"];
    foreach ($_POST['AS1'] as $id => $AS1)
    {
		
		 $AS1=$_POST["AS1"][$id];
		 $AS2=$_POST["AS2"][$id];
		 $AS3=$_POST["AS3"][$id];
		 $sql2="insert into $subject(roll_no,AS1,AS2,AS3) VALUES ( $roll_no,$AS1,$AS2,$AS3);";
		 if ($conn->query($sql2) == TRUE) {
    echo "";
} else {
    $flag=1;
}
    }
	}
}
		if($flag==1)
	{ 
echo "Error: " . $sql2 . "<br>" . $conn->error;

}
}
mysqli_close($conn);
?>