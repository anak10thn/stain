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
include(CONF);
include(CONTROLLER);
tcake_controller::database('mysql')->connect($host,$user,$pass);
$tb = "mahasiswa";
$array_field = array("id_mahasiswa","mahasiswa");
$array_value = array($_POST['kd_jurusan'],$_POST['mahasiswa']);
$id_field = "id_mahasiswa";
$id_value = $_POST['id_mahasiswa'];

$path = tcake_controller::path()->path_info();	
if ($_POST[update] == "yes") {
	tcake_controller::database('mysql')->db_update($tb,$array_field,$array_value,"kd_jurusan",$_POST[kd_jurusan]);
	echo "Data berhasil di update!";
}
else if ($_POST[update] == "no") {	
	tcake_controller::database('mysql')->db_insert($tb,$array_field,$array_value);
	echo "Data berhasil di insert!";
}
else if ($path[1] == "delete") {
	tcake_controller::database('mysql')->db_delete($tb,$id_field,$id_value);
	echo "Data berhasil di delete!";
}
else {
	echo ("HALAMAN TIDAK DIKETAHUI");
}

?>
