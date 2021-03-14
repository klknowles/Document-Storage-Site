<?php
    include("../common/documentHead.html");
    include("../background.php");
?>
<div class="box">
    <h3>Registration Form</h3>
    <form id="signup" action="../scripts/formSignUpProcess.php" method="POST">

            <label for="username">UserID</label>
            <!-- The username textbox where the user types their username -->
            <input type="text" name="username" placeholder="Username" id="username" required><br>
            <!-- The password label -->
            <label for="password">Password</label>
            <!-- The password textbox where the user types their password -->
            <input type="password" name="password" placeholder="Password" id="password" required><br>
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" placeholder="Password Confrimation" id="password2" required  oninput="validatePasswords()"><br>
            <!-- The email label -->
            <label for="email">E mail</label>
            <!-- The email textbox where the user types their email -->
            <input type="email" name="email" placeholder="Email" id="email" required><br><br>
            <!-- This is the register button, which prompts register.php. If the user's information is valid, it takes them to index.html to sign in.
                 If there is issue with the entered information, it will give the user an error notification related to the issue -->
            <input type="submit" value="Register">
    </form>
</div>
<?php
    include("../common/documentFoot.php");
?>