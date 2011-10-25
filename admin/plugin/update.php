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
if ($_POST[id_plugin]){
	if ($_POST[status]){
		$status="true";
	}
	else {
		$status="false";
	}
	if ($_POST[perm_dosen]){
		$perm_dosen="true";
	}
	else {
		$perm_dosen="false";
	}
	if ($_POST[perm_mahasiswa]){
		$perm_mahasiswa="true";
	}
	else {
		$perm_mahasiswa="false";
	}
	db_update("plugin",array("position","status","perm_dosen","perm_mahasiswa"),array($_POST[position],$status,$perm_dosen,$perm_mahasiswa),"id_plugin",$_POST[id_plugin]);
	echo "Plugin $_POST[id_plugin] berhasil di update!";
}
?>
