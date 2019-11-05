<?php
session_start();
?>
<?php
$host="localhost";
$user="root";
$password="";
$db="DAO";

mysqli_connect($host, $user, $password);
mysqli_select_db($db);

if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from loginform where User='".$uname."' AND Password='".$password."' limit 1";

    $result=mysqli_query($sql);

    if(mysqli_num_rows($result)==1){
        echo "You have successfully logged in";
        exit();
    }
    else{
        echo "You have entered and incorrect username and/or password";
        exit();
    }
}



?>

<head>
    <link rel = 'icon' href="Nampa%20Baseball%20Favicon.ico"/>
    <title> Welcome to Nampa High Baseball </title>
    <link rel="stylesheet" href="css/baseball.css">


</head>
<body>

<?php
require_once "bannerplusnav.php";
?>

    <div class="loginbox">
        <img src="loginavatar.jpg" class="avatar" alt="login avatar">
        <h1>Login Here</h1>
        <div class="messages">
            <?php
                if(isset($_SESSION['messages'])){
                    foreach($_SESSION['messages'] as $message) {
                        echo "<div> $message </div>";
                    }
                    unset($_SESSION['messages']);
                }
            ?>
        </div>
        <form id="login" action="loginhandler.php" method="post">
            <p>Username</p>
            <label>
                <input id="username" type="text" name="username" placeholder="Enter Username">
            </label>
            <p>Password</p>
            <label>
                <input id="password" type="password" name="password" placeholder="Enter Password">
            </label>
            <input type="submit" name="" value="Login">
           <p> <a href="#">Lost Your Password?</a></p>
           <p> <a href="register.php">Don't Have an Account?</a></p>

        </form>


    </div>


<?php
require_once "footer.php";
?>
</body>
