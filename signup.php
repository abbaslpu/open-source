<!DOCTYPE html>
<html>
<head>
<title>Signup form</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
function validate()
{

 if(document.form1.name.value=="")
  {
    alert("Plese Enter Username");
	document.form1.uname.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }

  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
</script>
</head>
<body>
<form name=form1 action="" method="post" onSubmit="return validate();">
    <div id="login-box">
    <div class="left">
        <h1>Sign up</h1>
        
        <input type="text" name="uname" placeholder="Username" />
        <input type="text" name="email" placeholder="E-mail" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="cpass" placeholder="Retype password" />
        
        <input type="submit" name="sumbit" name="signup_submit" value="Sign me up" />
    </div>
</form>
    <div class="right">
        <span class="loginwith">Sign in with<br />social network</span>
        
        <button class="social-signin facebook">Log in with facebook</button>
        <button class="social-signin twitter">Log in with Twitter</button>
        <button class="social-signin google">Log in with Google+</button>
    </div>
    <div class="or">OR</div>
    </div>
    <?php
        include 'connect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["uname"];
        $email = $_POST["email"];
        $password = $_POST["pass"];

        $sql = "INSERT INTO signup VALUES (DEFAULT, '$uname', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo 'thank you !';
                header("Location:login.php"); 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    ?>
</body>
</html>
