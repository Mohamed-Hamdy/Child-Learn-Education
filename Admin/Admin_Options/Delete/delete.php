<?php

$Course_id=$_GET["id"];

$con=mysqli_connect("localhost","root","");

mysqli_select_db($con,"it_project");

$q=mysqli_query($con,"delete from course where id=".$Course_id);

if ($q)
{
	header("Location:../../Admin_HomePage/index.php");
}
else
{
	echo "not deleted";
}
mysqli_close($con);



?>
