<?php
$dsn = 'mysql:host=localhost; dbname=it_project';
   $user='root'; 
   $pass='';
        $coursename=$_POST['coursename'];
        $teachername=$_POST['teachername']; 
        $numberstudent=$_POST['numberstudent'];

        $conn = mysqli_connect("localhost","root","", 'it_project');
        $q="INSERT INTO course(coursename,teachername,numberstudent)
        values ('$coursename','$teachername','$numberstudent')";
        $result=(mysqli_query($conn,$q));
        if ($result==true){
            header('location:../view/view.php');
            
        }
        else{
                header('location:../view/veiw.php');
        }

?>