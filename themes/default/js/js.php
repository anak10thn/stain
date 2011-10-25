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
 * 		created by ibnu yahya <ibnu.yahya@toroo.org>
 * 
 */

?>
<script type="text/javascript">
     $(document).ready(function(){ 
	 slideShow();
     $("#isi").accordion({active:0});
     $('.entry').tabs();
	$().ajaxStart(function() {
		$('#loading').show();
		$('#result').hide();
	}).ajaxStop(function() {
		$('#loading').hide();
		$('#result').fadeIn('slow');
	});

	//widgets
	<?php 
								$plugin = db_select_none("plugin","where position='widgets'");
								$count_plugin = mysql_num_rows($plugin);
								if ($count_plugin != '0') {
									while ($plugin_name = mysql_fetch_array($plugin))
									{
										
										if (file_exists(PLUGIN.$plugin_name['plugin_name']."/ajax.php")){
												
											if ($_SESSION[user] = "admin") {
												if ($plugin_name['status'] == "true"){
													include (PLUGIN.$plugin_name['plugin_name']."/ajax.php");
												}
											}
											else if ($_SESSION[user] = "dosen") {
												if ($plugin_name['perm_dosen']  == "true"){
													include (PLUGIN.$plugin_name['plugin_name']."/ajax.php");
												}
											}
											else if ($_SESSION[user] = "mahasiswa") {
												if ($plugin_name['perm_mahasiswa']  == "true"){
													include (PLUGIN.$plugin_name['plugin_name']."/ajax.php");
												}
											}
											
										}
										
									
									}
								}
								?>	
	//widgets
	<?php
	$setting_content = getfile("admin/");
	$count_sc = count($setting_content);
	$count_awal = 0;
	while ($count_awal < $count_sc) {
		if(file_exists("admin/".$setting_content[$count_awal]."/js.php")){
		include("admin/".$setting_content[$count_awal]."/js.php"); 
		}
		$count_awal++;
	}
	?>
	
	<?php
		$page_info = path_info();
		if ($page_info[1] == "page") {
			if(file_exists("plugin/".$page_info[2]."/js.php")){
			include("plugin/".$page_info[2]."/js.php"); 
			}
		}
	?>

});
</script>
