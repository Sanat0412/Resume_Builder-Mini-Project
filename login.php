<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    // $email = $_POST['email'];
    $pass = $_POST['psw'];
    if(empty($pass))
    {
        
    }
    // $pass = $_POST['psw'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "resume_mini";

    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "SELECT * FROM user_data WHERE username='$name'";
    $result = mysqli_query($conn, $sql);
    if($count=mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result))
        {
          if($row['username'] == $name)
          {
              if($row['password'] == $pass)
              {
                echo "Welcome " . $row['username'] . "<br>";
                header("refresh:2;url=afterLogin.php");
              }
              else{
                  echo "Invalid Password";
              }
            }
           
          
          
            /* if (strcmp($row['password'], $pass) !== 0 ) {
                echo "Password Incorrect!!";
            } else if (strcmp($row['username'], $name) !== 0) {
                echo "Invalid username!!";
            }
            else if ($count > 0) {
                echo "Welcome " . $row['username'] . "<br>";
                header("refresh:2;url=afterLogin.php");
            } else {
                echo "no user found";
            }*/

        }
    }
}
  /*  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


    if (strcmp($row['password'], $pass) !== 0 ) {
        echo "Password Incorrect!!";
    } else if (strcmp($row['username'], $name) !== 0) {
        echo "Invalid username!!";
    }
    else if ($count > 0) {
        echo "Welcome " . $row['username'] . "<br>";
        header("refresh:2;url=afterLogin.php");
    } else {
        echo "no user found";
    }
}*/

?>


<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- <title>Animated Login Form</title> -->
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="container">
        <header>Login Form</header>
        <form action="login.php" method="POST">
            <div class="input-field">
                <input type="text" name="name" required>
                <label>Email or Username</label>
            </div>
            <div class="input-field">
                <input class="pswrd" type="password" name="psw" required>
                <span class="show">SHOW</span>
                <label>Password</label>
            </div>
            <div class="button">
                <div class="inner">
                </div>
                <button type="submit">LOGIN</button>
            </div>
        </form>
        <div class="auth">
            Or login with</div>
        <div class="links">
            <div class="facebook">
                <i class="fab fa-facebook-square"><span>Facebook</span></i>
            </div>
            <div class="google">
                <i class="fab fa-google-plus-square"><span>Google</span></i>
            </div>
        </div>
        <div class="signup">
            Not a member? <a href="./signup.php">Signup now</a>
        </div>
    </div>
    <script>
        var input = document.querySelector('.pswrd');
        var show = document.querySelector('.show');
        show.addEventListener('click', active);

        function active() {
            if (input.type === "password") {
                input.type = "text";
                show.style.color = "#1DA1F2";
                show.textContent = "HIDE";
            } else {
                input.type = "password";
                show.textContent = "SHOW";
                show.style.color = "#111";
            }
        }
    </script>

</body>

</html>