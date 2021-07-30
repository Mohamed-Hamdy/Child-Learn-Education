<?php 
    session_start();
   $dsn = 'mysql:host=localhost; dbname=it_project';
   $user='root'; 
   $pass='';

$con=mysqli_connect("localhost","root","",'it_project');
mysqli_select_db($con,"is_project");

$q=mysqli_query($con,"select * from course");

    echo '<div class="limiter">';
        echo '<div class="container-table100">';
            echo '<div class="wrap-table100">';
                echo '<div class="table100 ver3 m-b-110">';
                    echo '<div class="table100-head">';
                        echo '<table>';
                            echo '<thead>';
                                echo '<tr class="row100 head">';
                                    echo ' <th class="cell100 column1">#</th>';
                                    echo '<th class="cell100 column2">name</th>';
                                    echo '<th class="cell100 column3">teacher</th>';
                                    echo '<th class="cell100 column4">capacity</th>';
                                    echo '<th class="cell100 column5"></th>';
                                    echo '<th class="cell100 column5"></th>';
                                    echo '<th class="cell100 column5"></th>';
                                    echo '<th class="cell100 column5"></th>';

                                echo '</tr>';
                            echo '</thead>';
                        echo '</table>';
                    echo '</div>';
                    echo '<div class="table100-body js-pscroll">';
                        echo ' <table>';
                            echo ' <tbody>';
                    $counter=1;

                                while ($row=mysqli_fetch_assoc($q))
                                    {
                                        $Course_id=$row["id"];
                                        $course_name = $row["coursename"];
                                        $_SESSION['coursename'] = $course_name;

                                        //echo '<tr class="row100 body">';
                                        echo "<td class='cell100 column1'>".$counter;
                                        echo "<td class='cell100 column2'>".$row["coursename"];
                                        echo "<td class='cell100 column3'>".$row["teachername"];
                                        echo "<td class='cell100 column4'>".$row["numberstudent"];
                                        echo "<td><a href='../Update/update.php?id=$Course_id'>Update</a>";
                                        echo "<td><a href='../Delete/delete.php?id=$Course_id'>Delete</a>";

                                    
                                    
                                        echo "</tr>";
                                        $counter++;
                                    }
                            echo '</tbody>';
                        echo '</table>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
mysqli_close($con);

?>
<html>

<head>
    <style>
        .button {
            position: absolute;
            top: 7.70%;
            right: 39%;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 24%;
            border:3px solid;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius:10px;
            border-color: 5px red;
        }
        .button {
            background-color: #222222;;
            font-size: 25px;
        }

        .button5 a {
            color: #808080;
        }

        .button5 a:hover {
            color: #00ad5f;
        }
        
    </style>
    <link rel="icon" href="s2.png" type="image/x-icon" />
    <title>Dashbord</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body style="background:linear-gradient(-45deg, rgba(205, 15, 216, 0.75) 0%, rgba(52, 131, 255, 0.75) 100%);">

    
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
</body>

</html>