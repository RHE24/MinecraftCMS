<?php $currentpage = "User Settings"; ?>
<?php include("./template/header.php")?>

<div id="content-in">

<?php
	if ((isset($_SESSION['username'])) && (!empty($_SESSION['username'])))
	{
		$username = $_SESSION['username'];
?>
<h2>Change Password</h2>

<form action="changepw2.php" method="post">
  <table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>Current Password:</td>
        <td><input name="currentpass" type="password"></td>
      </tr>
      <tr>
        <td>New Password:</td>
        <td><input name="password" type="password">
        </td>
      </tr>
      <tr>
        <td>Repeat Password:</td>
        <td><input name="password2" type="password">
        </td>
      </tr>
    </tbody>
  </table>
  <div align="center"><input value="Change" type="submit"></div>
</form>
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