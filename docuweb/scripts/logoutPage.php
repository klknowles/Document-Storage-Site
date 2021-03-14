<?php
    session_start();
    session_unset();
    session_destroy();
    include("../common/documentHead.html");
    include("../background.php");

?>
<div class='centercon'><p class='title-Greeting'>Success</p></div>
<div class='centercon'><p class='welcome-message'>you are logged out.</p></div>
<div class='centercon'><a id='home' href='../index.php'>Home</a></div>
<?php
    include("../common/documentFoot.php");
    session_abort();
?>