<?php
//session_start();
require_once("includes/db_connect.php");
require_once'CartPratice.php';
?>
<! DOCTYPE html>
<html>
<head>
<title>cart test</title>
</head>
<body>
<?php echo product(); ?>
<div id="cart">
<?php echo cart2(); ?>
</div>
</body>
</html>