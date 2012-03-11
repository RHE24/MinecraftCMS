<?php

class Functions
{
	public function logoHeader() {
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
	}
	public function newsHeader() {
		$result = mysql_query("SELECT * FROM settings");
		$row = mysql_fetch_object($result);
		if ($row->newsexist === 'true') {
			echo '<h2 id="content-title">' . $row->servername . ' > ' . $currentpage . '</h2>';
			echo '<div id="perex" class="box">';
			echo '<img src="./design/minecraft_icon.png" width="100px" height="95px" alt="news thumbnail" class="f-left" /><h2 id="news-top-title">' . $row->newstitle . '</h2><p id="news-top-body">' . $row->newsbody . '</p>';
			echo '</div>';
			echo '<hr class="noscreen" />';
		}
		else {
			echo '<h2 id="content-title">' . $row->servername . $currentpage . '</h2>';
			echo '<hr class="noscreen" />';
		}
	}
	public function news() {
		$sql="SELECT * FROM news ORDER BY id DESC";
		$result=mysql_query($sql);
		$nb = 10;
		$n = 0;
		while(($data = mysql_fetch_assoc($result)) and $n < $nb){
		echo '<h2 id="news-title">' . $data["title"] . '</h2>';
		echo '<div id="date">' . date("F j, Y \a\t g:i A",strtotime($data["date"])) . '</div>';
		echo $data["content"];
		echo '<p>Posted by ' . $data["poster"] . '</p><br />';
		$n = $n + 1;
		}
	}
	public function loginWidget() {
		if ((isset($_SESSION['username'])) && (!empty($_SESSION['username'])))
		{
			//Already logged in
			$susername = $_SESSION['username'];
			$sql = "SELECT * FROM users WHERE user_name='$susername'";
			$result = mysql_query($sql);
			$data = mysql_fetch_assoc($result);
			
			echo '<h4 id="aside-title">Hello, ' . $data["user_name"] . '</h4>';
			echo '<div class="aside-in">';
			echo '<div class="aside-box">';
			echo '<p>';
			echo '<div align="center"><img id="avatar" width="100px" height="100px" src="' . $data["user_avatar"] . '" /></div><br />';
			echo '<a href="settings.php">Change Settings</a><br />';
			echo '<a href="index.php?action=logout">Log out</a></p>';
			echo '</div> <!-- /aside-box -->';
			echo '</div> <!-- /aside-in -->';
		}
		else
		{
			//Login or register 
			echo '<h4 id="aside-title">Login/Register</h4>';
			echo '<div class="aside-in">';
			echo '<div class="aside-box">';
			echo '<form action="login.php" method="post">';
			echo '<div>';
			echo '<label for="username" id="cufon">Username: </label><br />';
			echo '<input type="text" name="login" /><br />';
			echo '<label for="password"" id="cufon2">Password: </label><br />';
			echo '<input type="password" name="password" /><br />';
			echo '<input type="submit" VALUE="Login">';
			echo '</div>';
			echo '</form>';
			echo '<br />';
			echo '<p>Not registered? <a href="register.php">Register here!</a></p>';
			echo '</div> <!-- /aside-box -->';
			echo '</div> <!-- /aside-in -->';
		}
	}
	public function statusWidget() {
		$result = mysql_query("SELECT * FROM settings");
		$row = mysql_fetch_object($result);
		
		$config['server']['ip']   = $row->serverip;
		$config['server']['port'] = $row->serverport;
		
		include './inc/mc.inc.php';
		$info = fetch_server_info($config['server']['ip'], "25566");
		
		if ($info === false){
			echo '<p id="serverstatus">' . $row->servername . '<br /><br />';
			echo 'Status: <font color="red">Offline</font>';
			echo '</p>';
			
		}else{
			
			echo '<p id="serverstatus">' . $row->servername . '<br />';
			echo '<br />';
			echo 'Status: <font color="green">Online</font><br />';
			echo "Slots: " . $info['playerCount'] . "/" . $info['maxPlayers'] . "<br />";
			echo 'Server IP: ' . $row->serverip . ':' . $row->serverport . '<br />';
			echo 'Player List:';
			echo '<div id="mypanel" class="ddpanel">';
			echo '<div id="mypanelcontent" class="ddpanelcontent">';
			
			echo '<p style="padding:10px" id="playerlist">';
			echo implode('<br />', $info['playerList']);
			echo '</p>';
			
			echo '</div>';
			echo '<div id="mypaneltab" class="ddpaneltab">';
			echo '<a href="#"><span id="toggle">Toggle</span></a>';
			echo '</div>';
			
			echo '</div>';
			echo '</p>';
		}
	}
	public function forumIndex() {
		$sql = "SELECT categories.cat_id, categories.cat_name, categories.cat_description, COUNT(topics.topic_id) AS topics FROM categories LEFT JOIN topics ON topics.topic_id = categories.cat_id GROUP BY categories.cat_name, categories.cat_description, categories.cat_id ORDER BY cat_id ASC";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'The categories could not be displayed, please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'No categories defined yet.';
			}
			else
			{
				//prepare the table
				echo '<table border="1px">
				<tr>
				<th>&nbsp;Category</th>
				<th>&nbsp;Last topic</th>
				</tr>';
		
				while($row = mysql_fetch_assoc($result))
				{
					echo '<tr>';
					echo '<td class="leftpart">';
					echo '<h3 id="nocufon"><a href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
					echo '</td>';
					echo '<td class="rightpart">';
		
					//fetch last topic for each cat
					$topicsql = "SELECT topic_id, topic_subject, topic_date, topic_cat FROM topics WHERE topic_cat = " . $row['cat_id'] . " ORDER BY topic_date DESC LIMIT 1";
		
					$topicsresult = mysql_query($topicsql);
		
					if(!$topicsresult)
					{
						echo 'Last topic could not be displayed.';
					}
					else
					{
						if(mysql_num_rows($topicsresult) == 0)
						{
							echo 'no topics';
						}
						else
						{
							while($topicrow = mysql_fetch_assoc($topicsresult))
								echo '<a href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a> at ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						}
					}
					echo '</td>';
					echo '</tr>';
				}
			}
		}
	}
	public function forumCategory() {
		//first select the category based on $_GET['cat_id']
		$sql = "SELECT cat_id, cat_name, cat_description FROM categories WHERE cat_id = " . mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'The category could not be displayed, please try again later.' . mysql_error();
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'This category does not exist.';
			}
			else
			{
				//display category data
				while($row = mysql_fetch_assoc($result))
				{
					echo '<h2>Topics in &prime;' . $row['cat_name'] . '&prime; category</h2><br />';
				}
		
				//do a query for the topics
				$sql = "SELECT topic_id, topic_subject, topic_date, topic_cat FROM topics WHERE topic_cat = " . mysql_real_escape_string($_GET['id']);
		
				$result = mysql_query($sql);
		
				if(!$result)
				{
					echo 'The topics could not be displayed, please try again later.';
				}
				else
				{
					if(mysql_num_rows($result) == 0)
					{
						echo 'There are no topics in this category yet.';
					}
					else
					{
						//prepare the table
						echo '<table border="1">
						<tr>
						<th>Topic</th>
						<th>Created at</th>
						</tr>';
		
						while($row = mysql_fetch_assoc($result))
						{
							echo '<tr>';
							echo '<td class="leftpart">';
							echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><br /><h3>';
							echo '</td>';
							echo '<td class="rightpart">';
							echo date('d-m-Y', strtotime($row['topic_date']));
							echo '</td>';
							echo '</tr>';
						}
					}
				}
			}
		}
	}
}