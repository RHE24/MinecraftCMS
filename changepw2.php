<?php $currentpage = "User Settings"; ?>
<?php include("./template/header.php")?>

<div id="content-in">
<?php
	if ((isset($_SESSION['username'])) && (!empty($_SESSION['username'])))
	{
		$username = $_SESSION['username'];

$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
$password2 = mysql_real_escape_string(htmlspecialchars($_POST['password']));
if($password != $password2)
{
	echo "That isn't the same password.<br />You will be redirected back to the previous page in 3 seconds.<br />If you didn't click the back button.";
	echo "<meta http-equiv='Refresh' content='3;url=changepw.php'>";
}
else
{
	$currentpass = mysql_real_escape_string(htmlspecialchars($_POST['currentpass']));
	$currentpass2 = hash('sha256', $salt.$currentpass);
	$checkpass = mysql_query("SELECT * FROM accounts WHERE password='$currentpass2'");
	if(mysql_num_fields($checkpass) != $currentpass ) {
		echo "That isn't the right password.<br />You will be redirected back to the previous page in 3 seconds.<br />If you didn't click the back button.";
		echo "<meta http-equiv='Refresh' content='3;url=changepw.php'>";
	}
	else
	{
		$passwordupdate = hash('sha256', $salt.$password);
		mysql_query("UPDATE accounts WHERE username='$username' password='$passwordupdate'");
		echo "Password changed!<br />You will be redirected back to the main page in 3 seconds.<br />If you haven't been redirected please click <a href='index.php'>here.</a>";
		echo "<meta http-equiv='Refresh' content='3;url=index.php'>";
	}
}
?>
<?php 
	} else {
?>
<div align="center"><h2>Error #1024<br />Are you logged in or do I have an error?</h2></div>
<?php 
	}
?>

</div>
</div> <!-- /content -->

<hr class="noscreen" />
<?php include("./template/sidebar.php")?>
<?php include("./template/footer.php")?>