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
$tmpl = new tmpl();
$controller = new tcake_controller();
$controller->driver();
$db = new db($_CONFIG['host'],$_CONFIG['user'],$_CONFIG['pass'],$_CONFIG['dbase']);
$db->query("select * from jurusan");
$extract = $db->extract();
$path = explode("/",$_SERVER['PATH_INFO']);
echo "<div id='dialog' title='Form Input'>";
new msg("msg","<spin id='output'></spin>");
include "module/".$path[2]."/form.php";
echo "</div>";
echo $tmpl->table(array("Kode Jurusan","Nama Jurusan","Edit"),$extract,array("kd_jurusan","jurusan"),"id_jurusan");

