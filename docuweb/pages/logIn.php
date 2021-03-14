<?php
    include("../common/documentHead.html");
    include("../background.php");
    session_start();
    if (isset($_SESSION['customer_id']))
    {
        header('Location: documentList.php');
    }
    $retrying = isset($_GET['retrying']);
?>

<div class="box">
<form id="loginForm" action="../scripts/formLoginProcess.php" method="POST">
    <label for="fname">UserID</label><br>
    <input type="text" id="username" name="username" placeholder="Enter your ID here."  style = "width: 90%;" required><br>
    <label for="lname">User Password</label><br>
    <input type="password" id="password" name="password" placeholder="Enter your password here." style = "width: 90%;" required><br><br>
    <input type="submit" value="Submit">
</form>
</div>
<?php
 include("../common/documentFoot.php");
?>