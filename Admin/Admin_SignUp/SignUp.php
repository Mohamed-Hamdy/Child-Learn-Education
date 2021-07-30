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
if (isset($_POST['register_btn'])) {
	$username  = $_POST["username"];
    $email  = $_POST["email"];
    $password_1 = $_POST["password_1"];

    // repeated mail validation
    $sq = "SELECT id FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn,$sq);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
    $count = mysqli_num_rows($result);
    if ($count != 0){
		array_push($errors, "That email is already taken.");   
    }

    
	if (count($errors) == 0) {
		$sql = " INSERT INTO admin(username , email , password) VALUES('$username' , '$email' , '$password_1')";
        if (mysqli_query($conn, $sql)) {
                header("Location: ../Admin_HomePage/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<html>

<head>
    <link rel="icon" href="s2.png" type="image/x-icon" />
    <title>Add Admin Form</title>
    <link rel="stylesheet" href="SignUp.css">
    <script>
        function validate() {

            var User_name = document.myform.username.value;
            var Email = document.myform.email.value;
            var password_1 = document.myform.password_1.value;
            var password_2 = document.myform.password_2.value;
            if (User_name == "") {
                alert("Please Fill Username");
                return false;
            } else if (Email == "") {
                alert("Please Fill Email");
                return false;
            } else if (password_1 == "") {
                alert("Please Fill Password");
                return false;
            } else if (password_2 == "") {
                alert("Please Fill  Confirm Password");
                return false;
            }
            if (password_1 != password_2) {
                alert("Confirm Password Not Equal Password");
                return false;
            }
        }
    </script>
</head>

<body style="background:linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);">
    <form method="post" action="SignUp.php" name="myform" onsubmit="return validate()">
        <?php if (count($errors) > 0): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
            <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <div class="header">
            <h2> Add Team Member </h2>
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Register</button>
        </div>
    </form>
</body>

</html>