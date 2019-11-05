


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
<h1>Welcome to Nampa Baseball</h1>
</div>
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
<img src="Rodeo%20Park.jpg" alt="Rodeo Park at Night" width="1500" height="600">


<?php
require_once "footer.php";
?>
</body>
</html>