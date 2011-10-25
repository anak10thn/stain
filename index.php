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
session_start();
include ("inc/define.php");
include (CONF);
include (MODEL);
include (VIEW);
include (CONTROLLER);
$driver = tcake_controller::database('mysql');
$driver->connect($host,$user,$pass);
$driver->db($db);
$setting_query = $driver->db_select("setting");
while ($setting = mysql_fetch_array($setting_query)){
	css_ui($setting[content_themes]);
	$themes = $setting[themes];
}
if (isset($_SESSION[md5_user])) {
	themes_show($themes);
}
else {
	themes_login($themes);
}
?>
