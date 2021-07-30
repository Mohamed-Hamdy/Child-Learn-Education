<?php
//session_start();
   $dsn = 'mysql:host=localhost; dbname=it_project';
   $user='root'; 
   $pass='';

$Course_id=$_POST["id"];
echo "$Course_id";
$coursename=$_POST['coursename'];
$teachername=$_POST['teachername'];
$numberstudent=$_POST['numberstudent'];


$con=mysqli_connect("localhost","root","");

mysqli_select_db($con,"it_project");

$q="UPDATE `course` SET `coursename` = '$coursename', `teachername` = '$teachername', `numberstudent` = $numberstudent WHERE `course`.`id` = $Course_id;
";
$result=(mysqli_query($con,$q));

if ($result==true)
{
 header("Location:../../Admin_HomePage/index.php");
}
else
{
    echo"not Updated";
}
mysqli_close($con);

?>