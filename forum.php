<?php $currentpage = "Forum"; ?>
<?php include("./template/header.php")?>

            <div id="content-in">
            <?php 
	            $className = new Functions;
	            $className->forumIndex();
			?>	
			</table>
				</div>
        </div> <!-- /content -->

        <hr class="noscreen" />
<?php include("./template/sidebar.php")?>
<?php include("./template/footer.php")?>