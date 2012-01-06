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
		$menu .= "$('input:submit').button();";
		$menu .= "$('#example').dataTable({
					\"bJQueryUI\": true,
					\"sPaginationType\": \"full_numbers\"
				});";
		/*$menu .= "$( \"#dialog\" ).dialog({
			autoOpen: false,
			show: \"blind\",
			hide: \"explode\"
		});";*/
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
	function content($content) {
		ob_start();
		include "module/".$content."/js.php";
		$jq_content = ob_get_contents();
		ob_end_clean();
		return $jq_content;
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
	
	function home() {
		$nav = "<div id=\"home\" class=\"ui-widget-content ui-corner-all\">
		<h3 class=\"ui-widget-header ui-corner-all\">Home</h3>
		";

		$nav .= "<p>Aplikasi ini merupakan sistem yang berisi tentang kegiatan akademik padaSTAIN Datokarama Palu yang dapat memberikan informasi tentang segala sesuatu yang berhubungan dengan kegiatan akademik, perkuliahan, data diri Dosen maupun Mahasiswa. Untuk masuk anda dapat memilih pilihan gambar Login yang tertera di samping kanan, memasukan Username dan Password anda, kemudian menekan tombol login. Jika mengalami kesulitan silahkan menghubungi admin di siakad@stain-palu.ac.id atau bagian Akademik dan Kemahasiswaan.
Silahkan memilih icon pada bagian kanan Admin, Dosen atau Mahasiswa. Aplikasi ini dalam pengembangan dan akan terus diperbaharui setiap hari sesuai kebutuhan.</p>";

		$nav .= "
		</div>";
		return $nav;
	}
	
	function tabs($link) {
		ob_start();
		echo "<div id='tabs'><ul>";
		foreach ($link as $url => $content) {
			$url_replace = str_replace(" ","",$url);
			$url_uc = ucfirst($url);
			if (file_exists($content)) {
				echo "<li><a href='#".$url_replace."'>".$url_uc."</a></li>";
			}
		}
		echo "</ul>";
		foreach($link as $url => $content) {
			$url_replace = str_replace(" ","",$url);
			echo "<div id='".$url_replace."'>";
			if (file_exists($content)) {
				include $content;
			}
			echo "</div>";
		}
		echo "</div>"; 
		$tabs = ob_get_contents();
		ob_end_clean();
		return $tabs;
	}
	
	function add() {
		echo 	"<div class=\"ui-state-default ui-corner-all\" title=\".ui-icon-circle-plus\">
				<input type='submit' value='+Tambah Data' id='add' class=\"ui-icon-circle-plus\">
				</div>";
	}
	
	function table($field,$record,$fieldx,$id) {
		ob_start();
		$this->add();
		echo ("
		<div class='demo_jui'>
		<table cellpadding='0' cellspacing='0' border='0' class='display' id='example'>
		<thead>
		<tr>");
		foreach ($field as $field_data) {
			echo ("<th>".$field_data."</th>");
		}
		echo ("</tr>
		</thead><tbody>");
		foreach ($record as $xrecord) {
		if ($xrecord) {
			echo ("<tr class='gradeC' id='".$xrecord[$id]."'>");
				foreach ($fieldx as $fieldxx) {
					echo ("<td>".$xrecord[$fieldxx]."</td>");
				}
				//<input type='submit' value='Delete' id='delete' name='".$xrecord[$id]."'>
					echo ("<td width='75'><input type='submit' value='Update' id='rubah' update='".$xrecord[$id]."'");
					
				foreach ($fieldx as $fieldxx2) {
					echo (" ".$fieldxx2."='".$xrecord[$fieldxx2]."' ");
				}
					
					echo ("></td>");
			echo ("</tr>");
			}
		}
		
		echo ("
		</tbody></table></div>");
		$table = ob_get_contents();
		ob_end_clean();
		return $table;
		
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

class msg {
	function __construct($div,$msg) {
		echo "<div id=\"".$div."\" class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\"> 
		<p><span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>
			".$msg."</p>
		</div>";
	}
}

$load = new load();
$load->_all();
$css = HOSTNAME."themes/toroo/css/default.css";
$stylecss = HOSTNAME."themes/toroo/css/style.css";
$form_css = HOSTNAME."themes/toroo/css/form.css";
$stylelogin = HOSTNAME."themes/toroo/css/login.css";
$model = new tcake_model();
$style = $model->style();
$script = $model->js('jquery').$model->ui().$model->js('jquery.cookie').$model->jlib('datatable');
$scriptlogin = $model->js('jquery.opt');

$jq = new jquery_ext();
$menujq = $jq->menu();
$tabsjq = $jq->tabs();

$module = new module();
foreach ($module->get() as $mdl) {
	$firstmdl_replace = str_replace("_"," ",$mdl);
	$firstmdl = ucwords($firstmdl_replace);
	$getmdl[$firstmdl] = HOSTNAME."index.php/module/$mdl";
}
$path_content = explode("/",$_SERVER['PATH_INFO']);
$menunav = $module->menunav('menunavigator','Menu',$getmdl);

if ($path_content[1] == "module" && $path_content[2])
{
	$jq_content = $jq->content($path_content[2]);
	$content = $module->tabs(array('report' => "module/".$path_content[2]."/report.php", 'export' => "module/".$path_content[2]."/export.php",'import' => "module/".$path_content[2]."/import.php"));
} else if (!$path_content[1] && !$path_content[1]) {
	$jq_content = "";
	$content = $module->home();
}
