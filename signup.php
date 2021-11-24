<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $repeat = $_POST['psw-repeat'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "resume_mini";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Sorry We failed to Connect Database" . mysqli_connect_error());
    } else {
        echo "Connection Established <br>";
    }

    // $name = "sanat";
    // $password = "@hoprux@12";
    // $email = "sachin@sachin.com";


    // SQL Query for inserting data in the table
    $sql = "INSERT INTO `user_data` (`username`, `email`, `password`) VALUES ( '$name' , '$email', '$pass')";
    // $sql1 = "SELECT `username` FROM `user` WHERE `username`=`$name`";

    // Check for Table Creation
    $sql2 = "SELECT `email` from `user_data` where `email`='$email'";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    // $result2 = mysqli_query( $conn, $sql1);
    // echo `$result`;
    
    if (strcmp($pass, $repeat) !== 0) {
        echo "Password do not match !!";
        // sleep(2);
        header('refresh:2;url=signup.php');
    }
    else if ($row > 0) {
        echo "Email is already in use";
    } else {
        $result = mysqli_query($conn, $sql);
        echo "user eneterd";
        header("Location: ./login.php");
        // echo "Record NOT Inserted Because" . mysqli_connect_error();
    }
    // if (mysqli_num_rows($result2) > 0) {
    //     echo $result2;
    // } else {
    //     echo "error";
    // }

}

?>




<!DOCTYPE html>
<html>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box
    }


    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }


    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }


    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }


    .cancelbtn,
    .signupbtn {
        float: left;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .signupbtn {
            width: 100%;
        }
    }
</style>
<body>

    <form action="signup.php" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label><b>Name</b></label>
            <input type="text" name="name" placeholder="Enter Name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>

</body>

</html>