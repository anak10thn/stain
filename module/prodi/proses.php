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
include "../../tcake/config.php";
include "../../tcake/driver/mysql.php";
$sql = new db($_CONFIG['host'],$_CONFIG['user'],$_CONFIG['pass'],$_CONFIG['dbase']);

if ($_GET['update'] == "no") {
	$sql->query("insert into prodi (kd_prodi,prodi) value ('$_GET[kd_prodi]','$_GET[prodi]')");
	echo "Data berhasil diinput!";
}
else if (!$_GET['update'] && $_GET['delete'] == 'yes') {
	$sql->query("delete prodi where id_prodi='$_GET[id]'");
	echo "Data berhasil didelete!";
}
else{
	$sql->query("update prodi set kd_prodi='$_GET[kd_prodi]',prodi='$_GET[prodi]' where id_prodi='$_GET[update]'");
	echo "Data berhasil diupdate!!";
}
