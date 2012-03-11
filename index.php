<?php $currentpage = "Homepage"; ?>
<?php include("./template/header.php")?>

            <div id="content-in">
            <dl>
            <?php 
	            $className = new Functions;
	            $className->news();
			?>	
				
				</dl>
            </div>
            
        </div> <!-- /content -->

        <hr class="noscreen" />
<?php include("./template/sidebar.php")?>
<?php include("./template/footer.php")?>