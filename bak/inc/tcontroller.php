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
class mysql {
	public function connect($hostname,$username,$password) {
		$conn = mysql_connect($hostname,$username,$password) or die ("MySQL not connected : ".mysql_error());
		return $conn;
	}
	//-----------------------------------------------	
	public function db($database){
		$db = mysql_select_db($database) or die ("Database error : ".mysql_error());
		return $db;
	}
	//-----------------------------------------------
	public function db_insert($tb,$array_field,$array_value) {
		$implode_field = implode(",",$array_field);
		$implode_value = implode("','",$array_value);
		$mysql_insert = "INSERT INTO $tb ($implode_field) value ('$implode_value')";
		$query = mysql_query($mysql_insert);
		return $query;
	}
	//-----------------------------------------------	
	public function db_update($tb,$field,$value,$id_field,$id_value) {
		$count=count($field);
		$i ='0';
			while ($i<$count) {
				$fv[$i]=$field[$i]."='".$value[$i]."'";
				$i++;
			}
		$field_value = implode(",",$fv);
		$query = mysql_query("UPDATE $tb SET $field_value where $id_field='$id_value'") or die (mysql_error());
		return $query;
	}
	//-----------------------------------------------	
	public function db_delete($tb,$id_field,$id_value) {
		$query = mysql_query("DELETE FROM $tb where $id_field='$id_value'") or die (mysql_error());
		return $query;
	}
	//-----------------------------------------------
	public function db_select($tb) {
		$mysql_select = "SELECT * FROM $tb";
		$query = mysql_query($mysql_select) or die (mysql_error());
		return $query;
	}
	//-----------------------------------------------
	public function db_select_costum($tb,$query,$opt_field) {
		if ($opt_field == "") {
			$opt_field = "*";
		}
		$mysql_select = "SELECT $opt_field FROM $tb $query";
		$query = mysql_query($mysql_select) or die (mysql_error());
		return $query;
	}
}

class path {
	//-----------------------------------------------
	public function getfile($path) {
		$handle = opendir($path) or die("Unable to open $path");
		$file_arr = array();
		while ($file = readdir($handle)) {
			$file_arr[] = $file;
		}
		$replace = array("..,",".,");
		$getfile = str_replace($replace,"",implode(",",$file_arr));
		$array_getfile = explode(",",$getfile);
		closedir($handle);
		return $array_getfile;
	}
	//-----------------------------------------------
	public function path_info() {
			$path = explode("/",$_SERVER['PATH_INFO']);
			return $path;
	}
}

class search {
	//-----------------------------------------------
	public function auto_complete($query,$tb,$field){
		$q = strtolower($query);
		if (!$q) return;

		$sql = "select * from $tb where $field LIKE '%$q%'";
		$rsd = mysql_query($sql);
		$count = mysql_num_rows($rsd);
		if ($count > '0') {
			while($rs = mysql_fetch_array($rsd)) {
				echo ($rs[$field]."\n");
			}
		}
		else {
			echo "Data tidak ditemukan";
		}
		return $rsd;
	}
}

class plugin {
	public function show() {
		$handle = opendir("plugin/") or die("Unable to open plugin");
		$file_arr = array();
		while ($file = readdir($handle)) {
			$file_arr[] = $file;
		}
		$replace = array("..,",".,");
		$getfile = str_replace($replace,"",implode(",",$file_arr));
		$array_getfile = explode(",",$getfile);
		closedir($handle);
		return $array_getfile;
	}

	public function report($plugin) {

			if (file_exists("plugin/".$plugin."/report.php")) {
				include ("plugin/".$plugin."/report.php");
			} else {
				echo ("File not exist!");
			}
	}
}

class module {
	public function show() {
		$handle = opendir("plugin/") or die("Unable to open plugin");
		$file_arr = array();
		while ($file = readdir($handle)) {
			if (file_exists("plugin/".$file."/info.php")) {
				include ("plugin/".$file."/info.php");
				if ($info == "modul") {
					$file_arr[] = $file;
				}
			}
		}
		$replace = array("..,",".,");
		$getfile = str_replace($replace,"",implode(",",$file_arr));
		$array_getfile = explode(",",$getfile);
		closedir($handle);
		return $array_getfile;
	}
}

class tcake_controller {
	public static function database($driver) {
		return new $driver;
	}
	public static function path() {
		return new path;
	}
	public static function search() {
		return new search;
	}
	public static function plugin() {
		return new plugin;
	}
	public static function module() {
		return new module;
	}
}
?>
