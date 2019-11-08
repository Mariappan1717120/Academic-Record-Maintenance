
<?php
$username=$_POST['username'];
$password=$_POST['password'];
if($username && $password)
{
$conn=mysqli_connect("localhost","root","","college");
$sql="select * from staff where username='$username'";
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
echo "<a href ='Staff.html'>Enter</a>";
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