<?php
/*
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 * 
 * 2011 (c) GPL
 * Ibnu Yahya <ibnu.yahya@toroo.org>
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title> System Informasi Akademik </title>
	<meta name="robots" content="index, follow" />
<?php

css_themes($themes,"default");
css_themes($themes,"form");
css_themes($themes,"jquery.autocomplete");
jquery();
jquery_ui_min();
jlib("datatable");
js_ui("upload");
js_ui("autocomplete2");
include(THEMES.$themes."/js/js.php");
js_ui("slideimages");

?>

</head>
<body>
 
<div id="wrapper">

<div id="logo">
	<img src="<?php echo HOSTNAME; ?>themes/default/images/header.png">
</div>
<div id="header">
	<div id="menu">
	<?php themes_navigator($themes); ?>
	</div>
</div>
<!-- end header -->
</div>
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<!-- <h1 class="title">Form Input Dosen</h1> -->
			<div class='entry'>
				<?php themes_content($themes); ?>			
			</div>
		</div>
	</div>
	
	<div id="sidebar">
		<div id="isi">
		<!-- MODUL -->
			<h2><a href='#'>Modul</a></h2>
						<div>
							<ul>
								<?php 
								$plugin = db_select_none("plugin","where position='modul'");
								$count_plugin = mysql_num_rows($plugin);
								if ($count_plugin != '0') {
									while ($plugin_name = mysql_fetch_array($plugin))
									{
										if ($_SESSION[user] = "admin") {
											if ($plugin_name['status'] == "true"){
												echo ("<li><a href='".HOSTNAME."index.php/page/".$plugin_name['plugin_name']."'>".ucfirst($plugin_name['plugin_name'])."</a></li>");	
											}
											
										}
										else if ($_SESSION[user] = "dosen") {
											if ($plugin_name['perm_dosen']  == "true"){
												echo ("<li><a href='".HOSTNAME."index.php/page/".$plugin_name['plugin_name']."'>".ucfirst($plugin_name['plugin_name'])."</a></li>");	
											}
											
										}
										else if ($_SESSION[user] = "mahasiswa") {
											if ($plugin_name['perm_mahasiswa']  == "true"){
												echo ("<li><a href='".HOSTNAME."index.php/page/".$plugin_name['plugin_name']."'>".ucfirst($plugin_name['plugin_name'])."</a></li>");	
											}
											
										}
															
										
									}
								}
								?>		
							</ul>
						</div>
			<!-- MODUL -->
			<!-- CONTENT -->
			<h2><a href='#'>Content</a></h2>
						<div>
							<ul>
								<?php 
								$plugin = db_select_none("plugin","where position='content'");
								$count_plugin = mysql_num_rows($plugin);
								if ($count_plugin != '0') {
									while ($plugin_name = mysql_fetch_array($plugin))
									{
										
										if ($_SESSION[user] = "admin") {
											if ($plugin_name['status'] == "true"){
												echo ("<li><a href='#'>".ucfirst($plugin_name['plugin_name'])."</a></li>");	
											}
											
										}
										else if ($_SESSION[user] = "dosen") {
											if ($plugin_name['perm_dosen']  == "true"){
												echo ("<li><a href='#'>".ucfirst($plugin_name['plugin_name'])."</a></li>");	
											}
											
										}
										else if ($_SESSION[user] = "mahasiswa") {
											if ($plugin_name['perm_mahasiswa']  == "true"){
												echo ("<li><a href='#'>".ucfirst($plugin_name['plugin_name'])."</a></li>");	
											}
											
										}								
									
									}
								}
								?>		
							</ul>
						</div>
				
				</div>
				<!-- CONTENT -->
				<!-- WIDGETS -->
								<?php 
								$plugin = db_select_none("plugin","where position='widgets'");
								$count_plugin = mysql_num_rows($plugin);
								if ($count_plugin != '0') {
									while ($plugin_name = mysql_fetch_array($plugin))
									{
										
										if ($_SESSION[user] = "admin") {
											if ($plugin_name['status'] == "true"){
												//echo ("<h2><a href='#'>".ucfirst($plugin_name['plugin_name'])."</a></h2>");
												include (PLUGIN.$plugin_name['plugin_name']."/widgets.php");
								
											}
										}
										else if ($_SESSION[user] = "dosen") {
											if ($plugin_name['perm_dosen']  == "true"){
												include (PLUGIN.$plugin_name['plugin_name']."/widgets.php");
											}
										}
										else if ($_SESSION[user] = "mahasiswa") {
											if ($plugin_name['perm_mahasiswa']  == "true"){
												include (PLUGIN.$plugin_name['plugin_name']."/widgets.php");
											}
										}
										
									
									}
								}
								?>	
				<!-- WIDGETS -->	
							
        
	</div>
	<div style="clear: both;"></div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal">
		&copy; <?php echo date('Y'); ?> <strong>t-siakad</strong> - All Rights Reserved<br />
		<a href="http://toroo.org">Ibnu Yahya</a>
	</p>
</div>
</body>
</html>
