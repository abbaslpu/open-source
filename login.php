<!DOCTYPE html>
<html>
<head>
<title>Login form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
    #login-box{
        position: relative;
        margin: 5% auto;
        width: 300px;
        height: 300px;
        background: #FFF;
        border-radius: 2px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }
    .welcome-box{
        position: relative;
        margin: auto auto;
        width: 300px;
        height: 100px;
        background: #FFF;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        text-align:center;
        text-justify:center;
        padding-top:12px;
    }
</style>
</head>
<body>

    <div id="login-box">
        <form name=form1 id="login-box" action="#" method="POST" onSubmit="return validate();">
            <div class="left">
                <h1>Login</h1>
                <input type="text" name="email" placeholder="Enter Email" />
                <input type="password" name="pass" placeholder="Enter Password" />
                <input type="submit" name="sumbit" name="signup_submit" value="Login" />
            </div>
        </form>
    </div>
    <?php
        include 'connect.php';
        $error ='';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $pass = $_POST["pass"];

            $sql = "SELECT * FROM signup";
        // $sql = "SELECT * FROM `signup` WHERE email='mahesh@gmail.com' and password='12345'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
                if ($email == $row["email"] && $pass == $row["password"]) {
                    echo '<div class="welcome-box" style="background-color:lightgreen;">Welcome '.$email.' </div>';
                    // header("Location:welcome.php"); 
                } else {
                    $error = "Sorry Email or Password does not match !!";
                    echo '<div class="welcome-box" style="background-color:red;" >' . $sql . '<br>' . $conn->error.'</div>';
                }
        }
    }
    ?>
</body>
</html>