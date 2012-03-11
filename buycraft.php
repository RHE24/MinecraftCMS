<?php $currentpage = "Homepage"; ?>
<?php include("./template/header.php")?>

            <div id="content-in">
			<?php

$bcapi_url = "http://api.buycraft.net/query?secret=83d043249170343dd048d4da62387f6cb39ed97f&action=payments";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bcapi_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$curlout = curl_exec($ch);
curl_close($ch);

$response = json_decode($curlout);

?>
<?php echo($response->payload["0"]->ign); ?>
            </div>
            
        </div> <!-- /content -->

        <hr class="noscreen" />
<?php include("./template/sidebar.php")?>
<?php include("./template/footer.php")?>