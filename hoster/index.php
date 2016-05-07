<?php
session_start();
error_reporting(0);
if (isset($_GET["exit"])) {
    session_destroy();
}
 if (!isset($_GET["validate"])) {
      require("templates/login_head.tmpl.php");
 ?>
 
  <div class="container">
        <div class="card card-container">
          <center><h1><b>Web</b>Parakeet</h1></center>
            <p id="profile-name" class="profile-name-card"></p>
            <?php if (isset($_GET["error"])) { ?>
            <div class="alert alert-danger" role="alert">The username/password you entered was incorrect.</div>
            <?php } ?>
            <form class="form-signin" method="POST" action="index.php?validate">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="username" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <center><div class="forgot-password">
                Copyright &copy; Tecflare Corporation All Rights Reserved<br>
                WebParakeet is owned and maintained by Tecflare Corporation
            </div></center>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <?php
     require("templates/login_footer.tmpl.php");
 } else {
   $output = exec("bash scripts/login.sh " . $_POST["username"] . " ".$_POST["password"]);
if($output == "no")
{
    header("Location: index.php?error");
    die("No Access");
}
$_SESSION["user"] = $_POST["username"];
header("Location: cp.php");
die();
 }



?>