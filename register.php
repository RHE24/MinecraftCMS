<?php $currentpage = "Register"; ?>
<?php include("./template/header.php")?>

        <hr class="noscreen" />
        
                    <div id="content-in">

            <h2>Register</h2>
            
            
            <form method="post">
  <table style="text-align: left; width: 100%;" border="0"
 cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>Username:</td>
        <td><input name="username" type="text" onkeyup="this.value=this.value.replace(/[&~#'{[\|`\\^@)\]°}=+$£¤¨ù%*µ!§:/;\,\?<>]/ig, '');"></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input name="password" type="password">
        </td>
      </tr>
      <tr>
        <td>Repeat Password:</td>
        <td><input name="password2" type="password">
        </td>
      </tr>
      <tr>
        <td>E-mail Address:</td>
        <td><input name="email" type="text" onkeyup="this.value=this.value.replace(/[&~#'{[\-|`_\\^)\]°}=+$£¤¨ù%*µ!§:/;\,\?<>]/ig, '');"></td>
      </tr>
    </tbody>
  </table>
  <div align="center"><input value="Register" type="submit"></div>
</form>
<?php
if(!empty($_POST['username']))
{


// Checks if password is the same
$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
$password2 = mysql_real_escape_string(htmlspecialchars($_POST['password']));
if($password == $password2)
{
$username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
$dbusernames = mysql_query("SELECT * FROM users WHERE user_name='$username'");
if(mysql_num_rows($dbusernames) > 0 ) {
	echo "<h3>That username has already been taken. Please use a different one.</h3>";
}
else
{
$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
$dbemail = mysql_query("SELECT * FROM users WHERE user_email='$email'");
if(mysql_num_rows($dbemail) > 0) {
	echo "<h3>That email has already been registered to a different user. Please use a different one.</h3>";
}
else
{
// Hashes password with SHA  256
$password = hash('sha256', $salt.$password);
// Rank is set to 0 (normal user)
$user_level = '0';
$date = date("Y/m/d H:i:s");

mysql_query("INSERT INTO users VALUES('', '$username', '$password', '$email', '$date', '$user_level', './design/default_avatar.gif')");
echo '<div>
			      <br /><h3>You have sucessfully registered!</h3><br />
				  		     
				<div style="clear:both"></div></div>
				<meta http-equiv="refresh" content="3; URL=index.php">
				<h3>You will be redirected to the main page in 3 seconds</h3>';
}
}
}
else
{
echo '<div><center><h3>The two passwords youve returned do not match ...</h3></center></div>';
}
}
?>
</div> <!-- /content -->
</div>
        <hr class="noscreen" />
<?php include("./template/sidebar.php")?>
<?php include("./template/footer.php")?>