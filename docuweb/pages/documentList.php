
<?php
    session_start();
    include("../common/documentHead.html");
    include("../background.php");
    include("../common/commonly.php");
    if($_SESSION['loggedin']){
        echo "<form action='../scripts/formUpload.php' method='post' enctype='multipart/form-data'>Select a file to upload:<input type='file' name='fileToUpload' id='fileToUpload'><input type='submit' value='Upload File' name='submit'></form>";
        $stmt = $con->prepare('SELECT docName FROM docuServe WHERE id = ?');
        $stmt->bind_param('s', $_SESSION['name']);
	    $stmt->execute();
	    $stmt->store_result();
        $stmt->bind_result($docname);
        if ($stmt->num_rows > 0) {
            echo "<div class='box'>";
            while($stmt->fetch()){
                echo "<div class='bar'><p id='documentName'>" . $docname . "</p><a class='fileops'id='down' href='../resources/uploads/" . $_SESSION['name'] . "/" . $docname . "' download>Download</a><a class='fileops'id='del' href='../scripts/formDeleteDoc.php?file=" . $docname . "'>Delete</a></div>";
            }
            echo "</div>";
        }
        else{
            // There are no uploaded documents here.
            echo "<div class='centercon'><h1>It looks like you haven't uploaded any documents yet. <br> 
            You can change that by clicking the 'Upload' button above.</h1></div>";
        }
        echo "<div class='centercon'><a class='frontnav'id='logout' href='../scripts/logoutPage.php'>Logout</a></div>";
    }
    include("../common/documentFoot.php");
?>