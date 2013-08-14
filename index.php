<?php
$pass = $_POST['pass'];

if($pass == "ahundredyears")
{
        include("home.html");
}
if(isset($_POST))
{?>

        <form method="POST" action="index.php">
        User <input type="TEXT" name="user"></input>
        Pass <input type="TEXT" name="pass"></input>
        <input type="submit" name="submit"></input>
        </form>
<?}
?>