    <div id="footer">
           
        <p class="f-right">MinecraftCMS &copy;. All rights reserved.</p>
        
        <p>Copyright &copy;&nbsp;<?php echo date("Y"); ?> <a href="index.php"><?php echo($servername); ?></a>. All rights reserved.</p>

    </div>

</div> <!-- /main -->

</body>
</html>

		<?php
		if(isset($_GET['action']))
		{
			$action = $_GET['action'];
			if($action == "logout")
			{
				session_destroy();
				echo '<META HTTP-EQUIV="Refresh" CONTENT="1; url=index.php">'; 

			}
		}
		?>