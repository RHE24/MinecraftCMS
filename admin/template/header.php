<?php session_start(); ?>
<?php require '../inc/config.php';?>
<?php 
require '../inc/mysql_connect.php';
mysql_query('set names utf8');
?>
<?php include '../inc/mc.inc.php';
$info = fetch_server_info($config['server']['ip'], $config['server']['port']);
?>
<?php
if(!$data['rank'] > 2) {
?>
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
    
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/scheme.css" />
    <link rel="stylesheet" media="print" type="text/css" href="css/print.css" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Harabara_700.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1'); // Works without a selector engine
		Cufon.replace('h2');
		Cufon.replace('h3');
		Cufon.replace('h4');
		Cufon.replace('h5');
		Cufon.replace('h6');
		Cufon.replace('.navButton');
		Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above
		Cufon.replace('#cufon');
		Cufon.replace('#cufon2');
		Cufon.replace('#cufon3');
		Cufon.replace('#cufon4');
		Cufon.replace('#cufon5');
	</script>

        <?php 
        $result = mysql_query("SELECT * FROM settings");
        while ($row = mysql_fetch_object($result)) {
        	echo '<title>';
        	echo $row->servername . '- Admin Panel';
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
         $result = mysql_query("SELECT * FROM settings");
         $row = mysql_fetch_object($result);
            if ($row->logoexist === 'true') {
            	echo '<img id="logoimg" src="' . $row->logo . '" alt="' . $row->servername . ' - ' . $row->slogan . '">';
            	echo '<hr class="noscreen" />';
            }
            else {
        		echo '<h1 id="logo">';
        		echo $row->servername;
        		echo '</h1>';
        		echo '<h2 id="slogan">';
        		echo $row->slogan;
        		echo '</h2>';
            }
            mysql_free_result($result);
            ?>
        <hr class="noscreen" />
        <!-- Hidden navigation -->
        <p class="noscreen noprint"><em>Quick links: <a href="#content">content</a>, <a href="#nav">navigation</a>.</em></p>
        <hr class="noscreen" />

    </div> <!-- /header -->

    <!-- Navigation -->
    <div id="nav">
    
        <ul class="box">
            <li>&nbsp;<a href="index.php" class="navButton">Homepage</a></li> <!-- Active page (highlighted) -->
        </ul>
        
    <hr class="noscreen" /> 
    </div> <!-- /nav -->
        <!-- 2 columns (content + sidebar) -->
    <div id="cols" class="box">

        <!-- Content -->
        <div id="content">
        
            <?php 
            $result = mysql_query("SELECT * FROM settings");
            $row = mysql_fetch_object($result);
            if ($row->newsexist === 'true') {
            	echo '<h2 id="content-title">' . $row->servername . ' > ' . $currentpage . '</h2>';
            	echo '<div id="perex" class="box">';
            	echo '<p><img src="./design/minecraft_icon.png" width="100px" height="95px" alt="news thumbnail" class="f-left" />' . $row->news_body . '</p>';
            	echo '</div>';
            	echo '<hr class="noscreen" />';
            }
            else {
            	echo '<h2 id="content-title">' . $row->servername . ' > ' . $currentpage . '</h2>';
            	echo '<hr class="noscreen" />';
            }
            mysql_free_result($result);
            ?>
    <?php 
} else {
    ?>
	
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
    
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/scheme.css" />
    <link rel="stylesheet" media="print" type="text/css" href="css/print.css" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Harabara_700.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1'); // Works without a selector engine
		Cufon.replace('h2');
		Cufon.replace('h3');
		Cufon.replace('h4');
		Cufon.replace('h5');
		Cufon.replace('h6');
		Cufon.replace('.navButton');
		Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above
		Cufon.replace('#cufon');
		Cufon.replace('#cufon2');
		Cufon.replace('#cufon3');
		Cufon.replace('#cufon4');
		Cufon.replace('#cufon5');
	</script>

        <?php 
        $result = mysql_query("SELECT * FROM settings");
        while ($row = mysql_fetch_object($result)) {
        	echo '<title>';
        	echo $row->servername . '- Admin Panel';
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
         $result = mysql_query("SELECT * FROM settings");
         $row = mysql_fetch_object($result);
            if ($row->logoexist === 'true') {
            	echo '<img id="logoimg" src="' . $row->logo . '" alt="' . $row->servername . ' - ' . $row->slogan . '">';
            	echo '<hr class="noscreen" />';
            }
            else {
        		echo '<h1 id="logo">';
        		echo $row->servername;
        		echo '</h1>';
        		echo '<h2 id="slogan">';
        		echo $row->slogan;
        		echo '</h2>';
            }
            mysql_free_result($result);
            ?>
        <hr class="noscreen" />
        <!-- Hidden navigation -->
        <p class="noscreen noprint"><em>Quick links: <a href="#content">content</a>, <a href="#nav">navigation</a>.</em></p>
        <hr class="noscreen" />

    </div> <!-- /header -->

    <!-- Navigation -->
    <div id="nav">
    
        <ul class="box">
            <li>&nbsp;<a href="index.php" class="navButton">Homepage</a></li> <!-- Active page (highlighted) -->
        </ul>
        
    <hr class="noscreen" /> 
    </div> <!-- /nav -->
        <!-- 2 columns (content + sidebar) -->
    <div id="cols" class="box">

        <!-- Content -->
        <div id="content">
        
            <?php 
            $result = mysql_query("SELECT * FROM settings");
            $row = mysql_fetch_object($result);
            if ($row->newsexist === 'true') {
            	echo '<h2 id="content-title">' . $row->servername . ' > ' . $currentpage . '</h2>';
            	echo '<div id="perex" class="box">';
            	echo '<p><img src="./design/minecraft_icon.png" width="100px" height="95px" alt="news thumbnail" class="f-left" />' . $row->news_body . '</p>';
            	echo '</div>';
            	echo '<hr class="noscreen" />';
            }
            else {
            	echo '<h2 id="content-title">' . $row->servername . ' > ' . $currentpage . '</h2>';
            	echo '<hr class="noscreen" />';
            }
            mysql_free_result($result);
            ?>
            
    <?php }?>