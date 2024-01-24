<?php
session_start();
if(isset($_POST['login']))
{
$user=$_POST['email'];
$pw=$_POST['pass'];

$c=mysqli_connect("localhost","root","","id_card") or die("Connection Error");
$sql="SELECT * FROM users WHERE Username='$user' AND Password='$pw'";
$r=mysqli_query($c,$sql) or die("Query Error");
if(mysqli_num_rows($r)>0)
{
    $_SESSION["user"]=$user;
    // echo "connection succeful";
    header("Location:homepage.html") ;
}
else
{
    header("Location:login.php?error=Invalid uname or password")  ;
  
}
} 
else if(isset($_POST['register']))
{

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $education=$_POST['education'];
    $email=$_POST['email'];
    $password=$_POST['pass'];


    $c=mysqli_connect("localhost","root","","id_card") or die("Connection Error");
    $sql="INSERT INTO users (Username,Password,Name,Gender,Education) VALUES('$email','$password','$name','$gender','$education')";
    mysqli_query($c,$sql) or die("Query Error");
}
else if(isset($_POST['logout']))
{   
session_start();
session_destroy();
header("Location:greenfield.php");
}
else{
    header("Location:greenfield.php") ;
}

?>
    
