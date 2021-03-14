<?php
session_start();
include("../common/documentHead.html");
include("../background.php");
include("../common/commonly.php");

if(isset($_GET["file"]))
{
    $data = $_GET["file"];
    $stmt = $con->prepare('DELETE FROM docuServe WHERE docName = ?');
    $stmt->bind_param('s', $data);
	$stmt->execute();
    unlink('../resources/uploads/' . $_SESSION['name'] . '/' . $data);

}

?>
<p class="title-Greeting">Success</p>
<p class="welcome-message">Your document was successfully deleted from the server.</p>
<a class="navbuttons"href="../pages/documentList.php">Return to Document List</a>
<div id='logoutsection'><a id='logout' href='../scripts/logoutPage.php'>Logout</a></div>
<?php
    include("../common/documentFoot.php");
?>