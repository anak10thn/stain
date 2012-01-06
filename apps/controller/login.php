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
defined('PATH') or die('Can\'t access!');
include ("tcake/config.php");
$login = new tcake_controller();
$login->driver();
$mysql = new db($_CONFIG['host'],$_CONFIG['user'],$_CONFIG['pass'],$_CONFIG['dbase']);

$pass = md5($_POST[pass]);
$user = $_POST[user];

$mysql->query("select * from login where iduser='$user'");


$extract = $mysql->extract();
foreach ($extract as $ceklogin) {
	if ($ceklogin) {
		if ($ceklogin[iduser] == $_POST[user] &&  $ceklogin[password] == $pass) {
			$_SESSION[user] = $ceklogin[iduser];
			$login->direct(HOSTNAME."index.php");	
		}
		else {
			$login->dialogbox("Password yang anda masukan salah!!");
			$login->direct(HOSTNAME."index.php");	
		}
	}
}


