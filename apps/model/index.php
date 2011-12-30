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

class jquery_ext {
	function menu() {
		$menu = "$(\"#menunav\").accordion();";
		return $menu;
	}
	function tabs() {
		$tabs = "$( \"#tabs\" ).tabs({
			cookie: {
				expires: 1
			}
		});";
		return $tabs;
	}
}
class tmpl {
	function menunav($id,$name,$link) {
		$nav = "<div id=\"$id\" class=\"ui-widget-content ui-corner-all\">
		<h3 class=\"ui-widget-header ui-corner-all\">$name</h3>
		<ul>";
		foreach ($link as $label => $lnk) {
				$nav .= "<li><a href='$lnk'>$label</a></li>";
			}
		$nav .= "</ul>
		</div>";
		return $nav;
	}
}
class module extends tmpl {
	function get() {
		$handle = opendir("module/") or die("Unable to open plugin");
		$file_arr = array();
		while ($file = readdir($handle)) {
			if (file_exists("module/".$file."/conf.php")) {
				include ("module/".$file."/conf.php");
				foreach ($perm_look as $show) {
					if ($show == $_SESSION[user]) {
						$file_arr[] = $file;
					}
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

class login extends tcake_model {
	private $path;
	function __construct() {
		$mysql = parent::driver();
		//$mysql->query("select * from user");
		$this->path = parent::path();
		$pass = md5($_POST['pass']);
		if ($path[1] == login) {
			if($path[2] == "admin") {
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
			else if($path[2] == "dosen") {
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
			else if($path[2] == "mahasiswa") {
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
		} else {
			
		}
	}
}

$css = HOSTNAME."themes/toroo/css/default.css";
$stylecss = HOSTNAME."themes/toroo/css/style.css";
$stylelogin = HOSTNAME."themes/toroo/css/login.css";

$model = new tcake_model();
$style = $model->style();
$script = $model->js('jquery').$model->ui().$model->js('jquery.cookie');
$scriptlogin = $model->js('jquery.opt');

$jq = new jquery_ext();
$menujq = $jq->menu();
$tabsjq = $jq->tabs();

$module = new module();
foreach ($module->get() as $mdl) {
	$firstmdl = ucfirst($mdl);
	$getmdl[$firstmdl] = "index.php/module/$mdl";
}
$menunav = $module->menunav('menunavigator','Menu',$getmdl);
