<!-- Sidebar -->
        <div id="aside">

            <!-- News -->
            <?php
				$className = new Functions;
		  		$className->loginWidget();
			?>
            
            <!-- Contact -->
            <h4 class="title">Server Status</h4>

            <div class="aside-in">
                <div class="aside-box">
				 <?php
					$className = new Functions;
		  			$className->statusWidget();
				 ?>
                </div> <!-- /aside-box -->
            </div> <!-- /aside-in -->
   
        </div> <!-- /aside -->
    
    </div> <!-- /cols -->
    
    <div id="cols-bottom"></div>

    <hr class="noscreen" />