<?php $currentpage = "User Settings"; ?>
<?php include("./template/header.php")?>

<div id="content-in">

<?php
	if ((isset($_SESSION['username'])) && (!empty($_SESSION['username'])))
	{
?>
<div align="center"><h2>Hello <?php echo $_SESSION['username'];?>!</h2>
<p>What can I help you with?</p>

<a href="changepw.php">Change Password</a><br/>
<a href="avatar.php">Use an avatar</a>

</div>
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