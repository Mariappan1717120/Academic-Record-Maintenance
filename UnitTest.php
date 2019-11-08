/
<html>
<head>
<title>Unit Test  </title>
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
  background-color: red;
  color: white;
}
</style>

</head>
<body>
<h1 style="color:blue;text-align:center">Unit Test Mark </h1>
<br>
<body>

<form action="UnitTest.php" method="post">
<div align="center" style="vertical-align:bottom" >
SUBJECT
<select  name="subject">
    <option></option>
    <option>PQT_UT</option>
    <option>TOC_UT</option>
    <option>CA_UT</option>
    <option>DBMS_UT</option>
    <option>OS_UT</option>
	<option>DAAA_UT</option>
  </select><br>
 </div><br><br>
<div align="center" style="vertical-align:bottom">
<div align="center" style="vertical-align:bottom">
    <table  cellpadding="25">
        <tbody>
           <tr> 
<th scope="col">Roll no</th>
<th scope="col">Unit Test Mark1</th>
<th scope="col">Unit Test Mark2</th>
<th scope="col">Unit Test Mark3</th>
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
<td><input type="text"  id="UT1" name="UT1[]" /></td>
<td><input type="text"  id="UT2" name="UT2[]"/></td>
<td><input type="text"  id="UT3" name="UT3[]"/></td>
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
	$sql1="create table $subject(roll_no int(10) ,UT1 int,UT2 int ,UT3 int);";
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
    foreach ($_POST['UT1'] as $id => $UT1)
    {
		
		 $UT1=$_POST["UT1"][$id];
		 $UT2=$_POST["UT2"][$id];
		 $UT3=$_POST["UT3"][$id];
		 $sql2="insert into $subject(roll_no,UT1,UT2,UT3) VALUES ( $roll_no,$UT1,$UT2,$UT3);";
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