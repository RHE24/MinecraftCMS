<?php session_start(); ?>
<?php require './inc/config.php';?>
<?php 
require './inc/mysql_connect.php';
mysql_query('set names utf8');
?>
<?php include './inc/buycraftapi.php'; ?>
<?php include './inc/functions.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="all,follow" />

    <meta name="author" lang="en" content="Dillon Modine-Thuen (MinecraftCMS)" />
    <meta name="copyright" lang="en" content="webdesign: Dillon Modine-Thuen; e-mail: itsyuka101@gmail.com" />

    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/scheme.css" />
    <link rel="stylesheet" media="print" type="text/css" href="./css/print.css" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/dddropdownpanel.js"></script>
	<script src="./js/cufon-yui.js" type="text/javascript"></script>
	<script src="./js/Harabara_700.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1:not(#nocufon)'); // Works without a selector engine
		Cufon.replace('h2:not(#nocufon)');
		Cufon.replace('h3:not(#nocufon)');
		Cufon.replace('h4:not(#nocufon)');
		Cufon.replace('h5:not(#nocufon)');
		Cufon.replace('h6:not(#nocufon)');
		Cufon.replace('.navButton');
		Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above
		Cufon.replace('#cufon');
		Cufon.replace('#cufon2');
		Cufon.replace('#cufon3');
		Cufon.replace('#cufon4');
		Cufon.replace('#serverstatus');
		Cufon.replace('#playerlist');
		Cufon.replace('#toggle');
	</script>

        <?php 
        $result = mysql_query("SELECT * FROM settings");
        while ($row = mysql_fetch_object($result)) {
        	echo '<title>';
        	echo $row->servername;
        	echo '</title>';
        }
        mysql_free_result($result);
        ?>
</head>

<body>

<div id="main">

    <!-- Header -->
    <div id="header">
    
         <?php 
			$className = new Functions;
	  		$className->logoHeader();
            ?>
        <hr class="noscreen" />

    </div> <!-- /header -->

    <!-- Navigation -->
    <div id="nav">
    
        <ul class="box">
            <li>&nbsp;<a href="index.php" class="navButton">Homepage</a></li>
            <li><a href="forum.php" class="navButton">Forums</a></li>
        </ul>
        
    <hr class="noscreen" /> 
    </div> <!-- /nav -->
        <!-- 2 columns (content + sidebar) -->
    <div id="cols" class="box">

        <!-- Content -->
        <div id="content">
        
            <?php 
            $className = new Functions;
            $className->newsHeader();
            	?>
    