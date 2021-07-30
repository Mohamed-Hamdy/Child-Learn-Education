<?php
   session_start(); 
   $dsn = 'mysql:host=localhost; dbname=it_project';
   $user='root'; 
   $pass='';
   

   //$id = isset($_GET['id']) ? $_GET['id'] : '';   
    $Course_id = $_GET["id"];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"it_project");
    
    $q=mysqli_query($con,"select * FROM course where id=$Course_id");

    $row=mysqli_fetch_assoc($q);

    mysqli_close($con);

?>

<html>

<head>
    <link rel="icon" href="s2.png" type="image/x-icon" />
    <title>Updata Form</title>
    <link rel="stylesheet" href="update.css">

</head>

<body style="background:linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);">
    <form method="post" action="update_ok.php" style="height:380px;">
        <input type="hidden" name="id" value="<?php echo $row["id"]?>">
        <h2 style="text-align: center;">Update Form</h2>
        <br>    
        <div class="input-group">
            <label>Course Name</label>
            <input type="text" name="coursename" value="<?php echo $row["coursename"]?>">
        </div>
        <br>
        <div class="input-group">
            <label>Teacher Name</label>
            <input type="text" name="teachername" value="<?php echo $row["teachername"]?>">
        </div>
        <br>
        <div class="input-group">
            <label>Cabicity</label>
            <input type="text" name="numberstudent" value="<?php echo $row["numberstudent"]?>">
        </div>
        <br>
        <div class="input-group">
            <button type="submit" class="btn" name="btn">Updata</button>
        </div>
    </form>
</body>

</html>
