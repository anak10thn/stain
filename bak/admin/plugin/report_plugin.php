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

include ("../../inc/define.php");
include (HOST.CONF);
include (HOST.FUNC);
conn_db($host,$user,$pass,$db);
$setting_query = db_select("setting");
while ($setting = mysql_fetch_array($setting_query)){
	$themes = $setting[themes];
}
function checkbox($field,$name){
	if ($field == "true") {
		echo ("<input type='checkbox' name='".$name."' value='yes' checked>");
	}
	if ($field == "false") {
		echo ("<input type='checkbox' name='".$name."' value='yes'>");
	}
}

conn_db($host,$user,$pass,$db);

/******************************************************report database*******************************************************/
$i = 1;
$db = db_select("plugin");
$db_count = mysql_num_rows($db);
	if ($db_count > 0){
	echo ("<table border='0' cellpadding='0' cellspacing='1' class='ui-state-default'>
						<tr class='header'>
								<td width='150'>Plugin</td>
								<td width='300'>Description</td>
								<td width='100'>Position</td>
								<td width='20'>Admin</td>
								<td width='20'>Dosen</td>
								<td width='20'>Mahasiswa</td>
								<td width='20'>Update</td>
						</tr>");
	while ($plugin = mysql_fetch_array($db)){
		
		echo ("<script>$('#".$plugin[id_plugin]."').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				alert(data);
			}
		})
		return false;
	});</script>");
			//report plugin
					
				if ($i%2){
					$class = "ganjil";
				} else {
					$class = "genap";
				}
				
		echo ("<form action='".HOSTNAME."admin/plugin/update.php' name='form' id='".$plugin[id_plugin]."' method='POST'>
		<tr class='".$class."'>
				<td><b>".ucfirst($plugin[plugin_name])."</b><input type='hidden' name='id_plugin' value='".$plugin[id_plugin]."'</td>
				<td>".$plugin[description]."</td>
				<td align='center'><select name='position'>");
					if ($plugin[position] == "modul") {
							echo ("<option selected value='modul'>Modul</option>
									<option value='content'>Content</option>
									<option value='widgets'>Widgets</option>");
						}
					else if ($plugin[position] == "content") {
							echo ("<option value='modul'>Modul</option>
									<option selected value='content'>Content</option>
									<option value='widgets'>Widgets</option>");
						}
					else if ($plugin[position] == "widgets") {
							echo ("<option value='modul'>Modul</option>
									<option value='content'>Content</option>
									<option selected value='widgets'>Widgets</option>");
						}
		echo ("</select></td><td align='center'>");
					checkbox($plugin[status],"status");
		echo ("</td>
				<td align='center'>");
				checkbox($plugin[perm_dosen],"perm_dosen");
		echo ("</td>
				<td align='center'>");
					checkbox($plugin[perm_mahasiswa],"perm_mahasiswa");
		echo ("</td>
				<td align='center'>
				<input type='image' src='".HOSTNAME.THEMES.$themes."/images/icon/update.png' name='id_plugin' >
				</td>
		</tr></form>");
			$i++;
		}
		echo ("</table>");

	}
	else {
		dialogbox("Plugin belum terinstal!");
	}
/******************************************************report database*******************************************************/

?>
