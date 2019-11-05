
<?php

session_start();
require_once ("DAO.php");
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
<div>
    <h1>Registration</h1>
</div>
<div class="messages">
    <?php
    if(isset($_SESSION['messages'])){
        foreach($_SESSION['messages'] as $message) {
            echo "<div> $message</div>";
        }
    }
    ?>
</div>
<form id='register' action='registrationhandler.php' method='post'
      accept-charset='UTF-8'>
    <fieldset >
        <legend>Register</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <label for='name' >Your First Name: </label>
        <input type='text' name='first_name' id='first_name' maxlength="50" />
        <label for='name' >Your Last Name: </label>
        <input type='text' name='last_name' id='last_name' maxlength="50" />
        <label for='email' >Email Address:</label>
        <input type='text' name='email' id='email' maxlength="50" />

        <label for='username' >UserName:</label>
        <input type='text' name='username' id='username' maxlength="50" />

        <label for='password' >Password:</label>
        <input type='password' name='password' id='password' maxlength="50" />
        <input type='submit' name='Submit' value='Submit' />

    </fieldset>


</body>



    <?php
    require_once "footer.php";
    ?>
</form>
