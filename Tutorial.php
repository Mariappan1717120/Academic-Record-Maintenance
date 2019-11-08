
<html>
<head>
<title> Tutorial  </title>
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
  background-color: gold;
  color: white;
}
</style>

</head>
<body>
<h1 style="color:green;text-align:center">Tutorial Mark </h1>
<br>
<body>

<form action="Tutorial.php" method="post">
<div align="center" style="vertical-align:bottom" >
SUBJECT
<select  name="subject">
    <option></option>
    <option>PQT_Tutorial</option>
    <option>TOC_Tutorial</option>
    <option>CA_Tutorial</option>
    <option>DBMS_Tutorial</option>
    <option>OS_Tutorial</option>
	<option>DAAA_Tutorial</option>
  </select><br>
 </div><br><br>
<div align="center" style="vertical-align:bottom">
<div align="center" style="vertical-align:bottom">
    <table  cellpadding="25">
        <tbody>
           <tr> 
<th scope="col">Roll no</th>
<th scope="col">Tutorial Mark1</th>
<th scope="col">Tutorial Mark2</th>
<th scope="col">Tutorial Mark3</th>
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
<td><input type="text"  id="Tu1" name="Tu1[]" /></td>
<td><input type="text"  id="Tu2" name="Tu2[]"/></td>
<td><input type="text"  id="Tu3" name="Tu3[]"/></td>
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
	$sql1="create table $subject(roll_no int(10) ,Tu1 int,Tu2 int ,Tu3 int);";
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
    foreach ($_POST['Tu1'] as $id => $Tu1)
    {
		
		 $Tu1=$_POST["Tu1"][$id];
		 $Tu2=$_POST["Tu2"][$id];
		 $Tu3=$_POST["Tu3"][$id];
		 $sql2="insert into $subject(roll_no,Tu1,TU2,Tu3) VALUES ( $roll_no,$Tu1,$Tu2,$Tu3);";
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