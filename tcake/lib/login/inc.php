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
include ("define.php");
include (HOST.CONF);
include (HOST.FUNC);
conn_db($host,$user,$pass,$db);
$path = path_info();
$pass = md5($_POST['pass']);
if($path[1] == "admin") {
	$query = db_select("admin");
	while ($login = mysql_fetch_array($query)){
		if ($login[user] == $_POST['user'] && $login[pass] == $pass) {
					$_SESSION[md5_user] = md5($_POST['user']);
					$_SESSION[user] = $_POST['user'];
					direct(HOSTNAME."index.php");
		}
		else { dialogbox_direct("Password atau Username salah!",HOSTNAME."index.php"); }
	}
}
else if($path[1] == "dosen") {
	$query = db_select("logindosen");
	while ($login = mysql_fetch_array($query)){
		if ($login[user] == $_POST['user'] && $login[pass] == $pass) {
			$_SESSION[md5_user] = md5($_POST['user']);
			$_SESSION[user] = $_POST['user'];
			direct(HOSTNAME."index.php");	
		}
		else { dialogbox_direct("Password atau Username salah!",HOSTNAME."index.php"); }
	}
}
else if($path[1] == "mahasiswa") {
	$query = db_select("loginmahasiswa");
	while ($login = mysql_fetch_array($query)){
		if ($login[user] == $_POST['user'] && $login[pass] == $pass) {
			$_SESSION[md5_user] = md5($_POST['user']);
			$_SESSION[user] = $_POST['user'];
			direct(HOSTNAME."index.php");			
		}
		else { dialogbox_direct("Password atau Username salah!",HOSTNAME."index.php"); }
	}
}
?>
