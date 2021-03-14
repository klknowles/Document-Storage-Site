<?php
session_start();
include("../common/documentHead.html");
include("../background.php");
include("../common/commonly.php");
$target_dir = "../resources/uploads/" . $_SESSION['name'];
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$stmt = $con->prepare('INSERT INTO docuServe (id, docName) VALUES (?, ?)');
$stmt->bind_param('ss', $_SESSION['name'], basename($_FILES["fileToUpload"]["name"]));
$stmt->execute();

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<p class='title-Greeting'>Success</p>";
        echo "<p class='welcome-message'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</p>";
        echo "<a class='navbuttons'href='../pages/documentList.php'>Return to Document List</a>";
        echo "<div id='logoutsection'><a id='logout' href='../scripts/logoutPage.php'>Logout</a></div>";
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }
}

include("../common/documentFoot.php");
?>