<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$stl="select count(doa) from student";
$result1= mysqli_query($conn, $stl);
$row1= mysqli_fetch_assoc($result1);
$sql = "select roll_no, count(roll_no) from student where attendance_status ='present' group by roll_no ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$i=0;
    while($row = mysqli_fetch_assoc($result)) {
		$percentage[$i]=((6 * $row["count(roll_no)"])/$row1["count(doa)"])*100;
	$present[$i]=$row["count(roll_no)"];
		$i++;
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
<html>
<body>
<table width=75% border=2 align="center">
        <tbody>
            <tr>
                <td>S.I</td>
                <td>Roll No</td>
                <td>NUMBER OF DAY Present</td>
				<td>PERCENTAGE</td>
            </tr>
            <tr>
                <td>1</td>
                <td> 1717103 </td>
                <td><?php echo $present[0] ?> </td>
                <td> <?php echo $percentage[0] ?></td>
            </tr>
			<tr>
                <td>2</td>
                <td> 1717105 </td>
                <td> <?php echo $present[1] ?> </td>
                <td> <?php echo $percentage[1] ?> </td>
            </tr>
			<tr>
                <td>3</td>
                <td> 1717106 </td>
                <td> <?php echo $present[2] ?> </td>
                <td> <?php echo $percentage[2] ?> </td>
            </tr>
			<tr>
                <td>4</td>
                <td> 1717112 </td>
                <td> <?php echo $present[3] ?> </td>
                <td> <?php echo $percentage[3] ?> </td>
            </tr>
			<tr>
                <td>5</td>
                <td> 1717119 </td>
                <td> <?php echo $present[4] ?> </td>
                <td> <?php echo $percentage[4]  ?> </td>
            </tr>
			<tr>
                <td>6</td>
                <td> 1717120 </td>
                <td> <?php echo $present[5] ?> </td>
                <td> <?php echo $percentage[5] ?> </td>
            </tr>
           </tbody>
		   </table>
		   </body>
</head>