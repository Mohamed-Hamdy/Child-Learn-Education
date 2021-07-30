<?php
session_start();
$username = "";
$email    = "";
$errors   = array();
$servername = "localhost";
$username_ser = "root";
$password = "";
$dbname = "it_project";
$conn = mysqli_connect($servername, $username_ser, $password, $dbname);
// call the register() function if register_btn is clicked
if (isset($_POST['btn'])) {
	$coursename = $_POST["coursename"];
	$teachername  = $_POST["teachername"];
	$numberstudent =$_POST["numberstudent"];

    
    // repeated mail validation
    $sq = "SELECT id FROM course WHERE coursename = '$coursename'";
    $result = mysqli_query($conn,$sq);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
    $count = mysqli_num_rows($result);

    if ($count != 0)
    {
		array_push($errors, "That Course is already Inserted.");   
    }

    
	if (count($errors) == 0) {
		$sql = " INSERT INTO course(coursename , teachername , numberstudent) VALUES('$coursename' , '$teachername' , '$numberstudent')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../Admin_HomePage/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<html>

<head>
    <link rel="icon" href="s2.png" type="image/x-icon" />

    <title>Insert Form</title>
    <link rel="stylesheet" href="Insert.css">
</head>

<body style="background:linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);">
    <form method="post" action="Insert.php">
        <?php if (count($errors) > 0): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
            <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <div class="header">
            <h2> Insert Course</h2>
        </div>
        <div class="input-group">
            <label>Course Name</label>
            <input type="text" name="coursename" value="">
        </div>
        <div class="input-group">
            <label>Course Teacher</label>
            <input type="text" name="teachername" value="">
        </div>
        <div class="input-group">
            <label>Cabicity</label>
            <input type="text" name="numberstudent">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="btn">Insert</button>
        </div>
    </form>
</body>

</html>