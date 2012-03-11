<!-- Sidebar -->
        <div id="aside">

            <!-- News -->
            <?php
	if ((isset($_SESSION['username'])) && (!empty($_SESSION['username'])))
	{
		//Are you logged in? ?> 
		
		 <h4 id="aside-title">Hello, <?php echo $_SESSION['username']; ?></h4>
            
            <div class="aside-in">
                <div class="aside-box">
					<p>Your Account<br />
					<a href="settings.php">Change Settings</a><br />
					<a href="index.php?action=logout">Log out</a></p>
                </div> <!-- /aside-box -->
            </div> <!-- /aside-in -->
		  	            <?php
		
	}
	else
	{
		//Login or register ?>
		<h4 id="aside-title">Login/Register</h4>

		     <div class="aside-in">
                <div class="aside-box">
		  	            <form action="login.php" method="post">
						    <div>
		                      <label for='username' id="cufon">Username: </label>
		                      <input type="text" name="login" />
		                      <label for='password' id="cufon2">Password: </label>
		                      <input type="password" name="password" /><br />
		                     <input type="submit" VALUE="Login">
							</div>
		  	            </form>
		  	            <br />
		  	            <p>Not registered? <a href="register.php">Register here!</a></p>
                </div> <!-- /aside-box -->
            </div> <!-- /aside-in -->
<?php
		
	}
	
?>                    
            
            <!-- Contact -->
            <h4 class="title">Server Status</h4>

            <div class="aside-in">
                <div class="aside-box">
                     	<?php
                if ($info === false){
                        ?>
                        		<p id="cufon3"><?php echo $servername; ?> is<br /><br />
                                Status: <font color="red">Offline</font>
                        </p>
                        <?php
                }else{
                        ?>
                        		<p id="cufon4"><?php echo $servername; ?> is<br /><br />
                                Status: <font color="green">Online</font><br />
                                Slots: <?php echo $info['playerCount'];?> / <?php echo $info['maxPlayers'];?>
                        </p>
                        <?php
                }
                ?>

                </div> <!-- /aside-box -->
            </div> <!-- /aside-in -->
   
        </div> <!-- /aside -->
    
    </div> <!-- /cols -->
    
    <div id="cols-bottom"></div>

    <hr class="noscreen" />