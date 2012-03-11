<?php
$currentpage = "Login";
include("./template/header.php");
?>
<div id="content-in">
<?php
// We start the session
$loginOK = false;


// It does the processing on the condition that
// information were actually posted

if((isset($_POST['login']))&&(isset($_POST['password']))){
	$login=htmlentities($_POST['login']);
	$password=htmlentities($_POST['password']);
}
//at least
$password = hash('sha256', $salt.$_POST['password']);
$username = mysql_real_escape_string($_POST['login']);

// We will look for the password associated with this login
$sql="SELECT * FROM users WHERE user_name='$username' and user_pass='$password'";
$result=mysql_query($sql);
$data = mysql_fetch_assoc($result);

// It verifies that the user exists


// We check that the password is correct
if (mysql_num_rows($result) === 1) {
	$loginOK = true;
	?>
<meta http-equiv="refresh" content="3; URL=index.php">
<h2>Successfully connected!<br /> You will be redirected to the main page in 3 seconds</h2>
<?php
}



// If the login has been validated you put the data into sessions
if ($loginOK) {
$_SESSION['username'] = $data['user_name'];
$_SESSION['password'] = $data['user_pass'];
$_SESSION['email'] = $data['user_email'];
$_SESSION['rank'] = $data['user_level'];
}


else {
?>
<meta http-equiv="refresh" content="3; URL=index.php">
<h2>Login failed!<br /> You will be redirected to the main page in 3 seconds</h2>
<?php
}
?>
	</div>
        </div> <!-- /content -->

        <hr class="noscreen" />
<?php include("./template/sidebar.php")?>
<?php include("./template/footer.php")?>