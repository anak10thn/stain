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
include ("config.php");
$target_path = "../uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	
require_once 'Excel2MySQL/excel2mysql.php';

$excel_file = $target_path;

$excel2mysql = new Excel2MySQL( $excel_file  );
//$excel2mysql->setConvertArea( '$A$1:$E$5' );

$excel2mysql->setRowStart(1);
$excel2mysql->setColStart('A');

$excel2mysql->setColMapping(array('NIS'=>'id_nis',
							'NAMA'=>'nama_siswa',
							'KELAS'=>'id_kelas',						
							'TLP'=>'no_hp',
							'ORTU'=>'nama_ortu'));

$excel2mysql->connectDB ('localhost','root','','sis','siswa');
$excel2mysql->injectData();

?>
