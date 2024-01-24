<?php
session_start();
if (isset($_SESSION["user"])) 
{
    header("Location:index.php");
} 

?>

<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="my.css">
</head>

<body>
    <div class="background">
        <div class="form">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="Register()">Register</button>
            </div>


            <form action="handler.php" method="POST" id="login" class="input-group">
                <div class="icon">
                    <img src="logos.jpg">
                </div>
                <input type="email" name="email" class="field" placeholder="Enter your email" required>
                <input type="password" name="pass" class="field" placeholder="Please enter password"  required>
                
                <div style="color:purple;font-size:15px"><input type="checkbox" class="check-box">Remember password</div>
                <div style="margin-bottom:12px">
                <p style="color:red;font-size:12px"><?php if(isset($_GET['error'])){ echo $_GET['error'];      } ?> </p></div>
               <button type="submit" class="submit-btn" name="login">Login</button>
                
            </form>
            <form action="handler.php" method="POST" id="register" class="input-group">
                <input type="name" name="name" class="field-a" placeholder="Enter your Full Name" required>
                <input type="text" name="gender" class="field-a" placeholder="Enter your Gender" required>
                <select name="education" class="field-a" required>
                    <option value="BCA">BCA</option>
                    <option value="BBM">BBM</option>
                    <option value="BBS">BBS</option>
                    <option value="BSW">BSW</option>
                </select>
                <input type="text" name="email" class="field-a" placeholder="Enter your email" required>
                <input type="password" name="pass" class="field-a" placeholder="Please enter password" required>
                <input type="checkbox" class="check-box">
                <span2>Agree Terms and condition</span2>
                <button type="submit" name="register" class="submit-btn">Register</button>
            </form>

        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function Register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>

</body>

</html>