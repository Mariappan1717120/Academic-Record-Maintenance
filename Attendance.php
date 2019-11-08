<html>
<head>
<title> attendance </title>
<style>
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}

 td, th {
  border: 1px solid #ddd;
}

tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

th {
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

</head>
<body>
<h1 style="color:blue;text-align:center">ATTENDANCE ENTRY</h1>
<br>
<form action="Attendance.php" method="post">
<div align="center" style="vertical-align:bottom">
DATE <input type ="date" name ="day" value="" />
SUBJECT  <select  name="subject">
    <option></option>
    <option>PQT_Attendance</option>
    <option>TOC_Attendance</option>
    <option>CA_Attendance</option>
    <option>DBMS_Attendance</option>
    <option>OS_Attendance</option>
	<option>DAAA_Attendance</option>
  </select><br>
</div><br><br>
<div align="center" style="vertical-align:bottom">
<div align="center" style="vertical-align:bottom">

    <table  cellpadding="20" >
 
        <tbody>
            <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>Attendance</th>
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
                <td>
                    <?php echo $row["roll_no"] ?> 
                    <input type="hidden" name="roll_no[]" value= "<?php echo $row["roll_no"] ?> " />
                </td>
                <td>
                    <?php echo $row["fullname"] ?> 
                    <input type="hidden" name="student_name[]" value="<?php echo $row["fullname"] ?> " />
                </td>
                <td>
                        <input type="checkbox" id="present" name="attendance_status[0]" value="Present"> Present
                 
                        <input type="checkbox"  id="absent" name="attendance_status[0]" value="Absent"> Absent
                   
                </td>
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
  </div>
  </div>  
    <br><br>
	<div align="center" style="vertical-align:bottom">
    <input type="submit" name="submit" value="Mark Attendance" />
	<div>
</form>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="college";
$conn = mysqli_connect($servername, $username, $password,$db);
if(isset($_POST['submit']))
{
	$doa=$_POST["day"];
	$subject=$_POST['subject'];
    foreach ($_POST['attendance_status'] as $id => $attendance_status)
    {
        
       
		 $roll_no = $_POST['roll_no'][$id];
	$name = $_POST['student_name'][$id];
		 $sql="insert into $subject(roll_no,student_name, doa, attendance_status) VALUES ( $roll_no,'$name','$doa', '$attendance_status');";
		 if ($conn->query($sql) === TRUE) 
           echo "";
	   else{
		   echo "<p align='center'> <font color=red size='6pt'>Please Enter the ATTENDANCE Status for all Student</font> </p><br/>";
	   }		   
    }
}
mysqli_close($conn);
?>