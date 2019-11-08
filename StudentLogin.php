
<?php
$username=$_POST['username'];
$password=$_POST['password'];
session_start();
$_SESSION["username"]=$username;
if($username && $password)
{
$conn=mysqli_connect("localhost","root","","college");
$sql="select * from users where username='$username'";
$query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($query);
if($count!=0)
{
while($row=mysqli_fetch_assoc($query))
{
$dbusername=$row['username'];
$dbpassword=$row['password'];
}
if($username==$dbusername && $password==$dbpassword)
{
echo "<a href ='pqt.php'>Enter</a>";
}
else
{
die("Incorrect Password");
}
}
else
{
die("The user does not exit");
}
}
else
{
die("Please Enter the Username and Password!");
}

?>