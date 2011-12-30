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
function report($tb,$field,$value) {
	$db = tcake_controller::database("mysql")->db_select($tb);
	$count = mysql_num_rows($db);

	if ($count != 0) {
		echo ("<center>
		<div class='demo_jui'>
		<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
		<tr>
			<th>Kode Fakultas</th>
			<th>Fakultas</th>
			<th>edit</th>
		</tr>
		</thead><tbody>");

		while ($data = mysql_fetch_array($db)){

			echo ("<tr class='gradeC'>
	<td align='center'><b>{$data[kd_fakultas]}</b>
	<input type='hidden' id='kd_fakultas{$data[kd_fakultas]}' value='{$data[kd_fakultas]}'>
	</td> <td><b>{$data[fakultas]}
	</b><input type='hidden' id='fakultas{$data[kd_fakultas]}' value='{$data[fakultas]}'></td>
	<td align='center'><input type='image' id='{$data[kd_fakultas]}' class='del'src='".HOSTNAME.THEMES."default/images/icon/delete.png'> <input type='image' id='update".$fakultas[kd_fakultas]."' src='".HOSTNAME.THEMES."default/images/icon/update.png'></td>
	</tr>");
			$i++;
		}
		echo ("
		</tbody></table></div></center>");
	} else {
		echo "<h3>Data masih kosong!</h3>";
	}
}
?>
