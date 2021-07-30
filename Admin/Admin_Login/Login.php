<?php
session_start();
$email    = "";
$errors   = array();
$servername = "localhost";
$username_ser = "root";
$password_ser = "";
$dbname = "it_project";
$conn = mysqli_connect($servername, $username_ser, $password_ser, $dbname);
if($_SERVER["REQUEST_METHOD"] == "POST") {
        $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $sql = "SELECT id FROM admin WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);

        
       if($count == 1){
           $_SESSION['email'] = $myemail;
           header('location:../Admin_HomePage/index.php');
       }
       else{
           array_push($errors , "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Some Thing wrong 
             <br>&nbsp;&nbsp;
             mail is not found or password is not true");
       }
}
?>
<html>

<head>
    <link rel="icon" href="s2.png" type="image/x-icon" />
    <title>Login Form</title>
    <link rel="stylesheet" href="Login.css">
        <script>
        function validate() {
            var Email = document.myform.email.value;
            var password = document.myform.password.value;
            if (Email == "") {
                alert("Please Fill Email");
                return false;
            } else if (password == "") {
                alert("Please Fill Password");
                return false;
            } 
        }

    </script>
</head>

<body style="background:linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);">
    <form method="post" action="Login.php" style="position: absolute; top:13%; left:38%;"  name ="myform" onsubmit="return validate()">
        <?php if (count($errors) > 0): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
            <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <div class="header" style=" width:250px;">
            <h2> Admin Login</h2>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="btn">Login</button>
        </div>
    </form>
</body>

</html>