<?php
$password = "ahundredyears";
$nonsense = "supercalifragilisticexpialidocious";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>

    <?php include_once("home.html"); ?>

<?php
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['keypass'] != $password) {
      echo "Incorrect password.";
      exit;
   } else if ($_POST['keypass'] == $password) {
      setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
      header("Location: $_SERVER[PHP_SELF]");
   } else {
      echo "Whoops, something went wrong.";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="robots" content="noindex" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Compass</title>
  <link rel="stylesheet" href="stylesheets/screen.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>

   <form class="gate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
      <label><input type="password" name="keypass" id="keypass" placeholder="Password"/></label>
      <input type="submit" id="submit" class="btn" value="Submit" />
   </form>
</body>
</html>