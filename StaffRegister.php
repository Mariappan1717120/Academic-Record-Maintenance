<html>
<br><br><br><br><br><br>
<center>
<form action="StaffRegister.php"method ="post">
<table cellspacing="40">
<tr>
<td> Staff Id     :</td>
<td><input type="text" name="Staff_id"></td>
</tr>
<tr>
<td> Your Full Name:</td>
<td><input type="text" name="fullname"></td>
</tr>
<tr>
<td> Phone Number  :</td>
<td><input type="text" name="phnno"></td>
</tr>
<tr>
<td> Username      :</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td> Password      :</td>
<td><input type="password" name="password"></td>
</tr>
</table>
<br><br>
<h2><input type='submit' name='submit' value ='Registered'><h3>
<p> <a href="StaffLogin.html">returns to login page</a> </p>
</form>
</center>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="college";
$conn = mysqli_connect($servername, $username, $password,$db);
if(isset($_POST['submit']))
{
$Staff_id=$_POST['Staff_id'];
$fullname=$_POST['fullname'];
$phnno=$_POST['phnno'];
$username=$_POST['username'];
$password=$_POST['password'];
if($Staff_id && $fullname  && $phnno && $username && $password )
{
$sql="insert into Staff values($Staff_id,'$fullname',$phnno,'$username','$password')";
if ($conn->query($sql) == TRUE)
{
echo "<p align='center'> <font color=green  size='6pt'>You have been Registered Successfully</font> </p>";
echo "";
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
	
}
}

else
{
	echo "<p align='center'> <font color=red  size='6pt'>Please Fill all the details</font> </p>";
}
}
?>

