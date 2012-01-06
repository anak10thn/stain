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

class tcake_model
{
	public $core, $wgets;
	
	function __construct() {
		$this->core = TCAKE;
		require_once $this->core . 'config.php';
		$this->wgets = $_CONFIG['wgets'];
	}
	
	function js($js_val) {
		$js = "<script type='text/javascript' src='". HOSTNAME . "tcake/js/". $js_val .".js'></script>";
		return $js;
	}
	
	function lib($lib_val) {
		ob_start();
		include ($this->core . "lib/" . $lib_val . "/inc.php");
		$lib = ob_get_contents();
		ob_end_clean();
		return $lib;
	}
	
	function jlib($jlib_val) {
		ob_start();
		include ($this->core . "jlib/" . $jlib_val . "/inc.php");
		$jlib = ob_get_contents();
		ob_end_clean();
		return $jlib;
	}
	
	function style() {
		$style = "<link type='text/css' href='". HOSTNAME . "tcake/style/". $this->wgets ."/jquery.ui.all.css' rel='stylesheet' />";
		return $style;
	}
	
	function ui() {
		$ui = "<script type='text/javascript' src='". HOSTNAME . "tcake/ui/jquery.ui.js'></script>";
		return $ui;
	}
		

}

class tcake_view
{
    var $TAGS = array();
    var $THEME;
    var $CONTENT;
    
     function __construct($themename)
    {
        $this->THEME = $themename;
        $this->tagMulai ();
        $this->tagAkhir ();
    }
    
    function tagMulai ($tagA = '['){
	    $this->tagAwal = $tagA;
    }
    
    function tagAkhir ($tagE = ']') {
	    $this->tagAkhir = $tagE;  
    }
    
    
    
    function define_tag($tagname, $varname=false)
    {
	    if (is_array ($tagname)){
		    foreach ($tagname as $key => $value) 
            { 
            $this->TAGS[$key] = $value; 
            } 
	    }else {
        $this->TAGS[$tagname] = $varname;
    		}
    }
    
   
    
    function parse()
    {
        $this->CONTENT = @file($this->THEME) OR DIE ('can\'t load template');
        
        $this->CONTENT = implode("", $this->CONTENT);
       
        foreach ($this->TAGS as $kunci=>$nilai){
	        $start = $this->tagAwal . $kunci . $this->tagAkhir;
	        $this->CONTENT = str_replace($start, $nilai, $this->CONTENT);
	        
        }
        
       return $this->CONTENT;
    }
	
	function show_themes()
	{
		echo $this->parse();
	}
	
	function navigator ($headnav) {
		if (is_array($headnav)) {
			$nav = "<ul>";
			foreach ($headnav as $label=>$link) {
				$nav .= "<li><a href='".$link."'>".$label."</a></li>";
			}
			$nav .= "</ul>";
		}
		return $nav;
	}
	
	

	
}

class tcake_controller {
	private $core, $driver, $chk_session;
	function __construct() {
		$this->core = TCAKE;
		require_once $this->core . 'config.php';
		$this->driver = $_CONFIG['driver'];
	}
	function driver() {
		require_once $this->core . 'driver/mysql.php';
	}
	
	function direct($url_direct) {
		echo "<meta http-equiv='refresh' content='0;url=".$url_direct."'>";
	}
	
	function dialogbox($message) {
		echo "<script type='text/javascript'> alert('".$message."') </script>";
	}
	
	function unset_session($session) {
		unset($_SESSION[$session]);
	}
	function check_session($session) {
		$this->chk_session = isset($_SESSION[$session]);
		return $this->chk_session;
	}
	
	function form($array_label,$array_type,$array_name,$array_value,$array_class,$array_id,$input_tag) {

	$count=count($array_label);
	$count_type=count($array_type);
	$count_name=count($array_name);
	$count_value=count($array_value);
	$count_class=count($array_class);
	$count_id=count($array_id);
	$count_tag=count($input_tag);

	$i ='0';
		while ($i<$count) {	
			
				if ($count_tag == '1') {
					$style = explode(":",$input_tag);
				}
				else {
					$style = explode(":",$input_tag[$i]);
				}
				
			
				if ($count_class == '1') {
					$class = "class='".$array_class."'";
				}
				else {
					$class = "class='".$array_class[$i]."'";
				}
				
				if ($count_id == '1') {
					$id = "id='".$array_id."'";
				}
				else {
					$id = "id='".$array_id[$i]."'";
				}
				
				if ($count_type == '1') {
					$type = $array_type;
				}
				else {
					$type = $array_type[$i];
				}
				
				if ($count_name == '1') {
					$name = "name='".$array_name."'";
				}
				else {
					$name = "name='".$array_name[$i]."'";
				}
				
				if ($count_value == '1') {
					$value = $array_value;
				}
				else {
					$value = $array_value[$i];
				}
				
				
				echo ($style[0]);
				
						echo ("<label>".$array_label[$i]."</label>");
						
						if ($type == "text") {
							echo "<input type='text' ".$class." ".$id." ".$name." value='".$value."'>";
						}
						else if ($type == "hidden") {
							echo "<input type='hidden' ".$class." ".$id." ".$name." value='".$value."'>";
						}
						else if ($type == "password") {
							echo "<input type='password' ".$class." ".$id." ".$name." value='".$value."'>";
						}
						else if ($type == "submit") {
							echo "<input type='submit' ".$class." ".$id." ".$name." value='".$value."'>";
						}
						else if ($type == "reset") {
							echo "<input type='reset' ".$class." ".$id." ".$name." value='".$value."'>";
						}
						else if ($type == "textarea") {
							echo "<textarea ".$class." ".$id." ".$name.">".$value."</textarea>";
						}
						else if ($type == "file") {
							echo "<input type='file' ".$class." ".$id." ".$name." value='".$value."'>";
						}
						else if ($type == "select") {
							$select_value = explode(":",$value);
							$count_select_value = count($select_value);
							$j='0';
							echo "<select ".$class." ".$id." ".$name.">";
							while ($j<$count_select_value) {
								$selected = explode("*",$select_value[$j]);
								if ($selected[1] == "select") {
									echo "<option selected value='".$selected[0]."'>".$selected[0]."</option>";
								}
								else {
									echo "<option value='".$select_value[$j]."'>".$select_value[$j]."</option>";
								}
								$j++;
							}	
							echo "</select>";
						}
						
				
				echo ($style[1]);
				
				
			$i++;
		}
		
		}
}

class load {
	public $path;
	function __construct() {
		$this->path = explode("/",$_SERVER['PATH_INFO']);
		return $this->path;
	}
	
	function _default() {
		if (file_exists(MODEL . 'index.php')) {
				include MODEL . 'index.php';
		}	
		if (file_exists(VIEW . 'index.php')) {
			include VIEW . 'index.php';
		}
		if (file_exists(CONTROLLER . 'index.php')) {
			include CONTROLLER . 'index.php';
		}
	}
	
	function _all() {
		if ($this->path[1]) {
			if (file_exists(MODEL . $this->path[1] . '.php')) {
				include MODEL . $this->path[1] . '.php';
			}
			
			if (file_exists(VIEW . $this->path[1] . '.php')) {
				include VIEW . $this->path[1] . '.php';
			}
			if (file_exists(CONTROLLER . $this->path[1] . '.php')) {
				include CONTROLLER . $this->path[1] . '.php';
			}
		}
	}
	
	/*function _model($url) {
		if (file_exists(MODEL . $this->path[1] . '.php') && $url == $this->path[1]) {
			include MODEL . $this->path[1] . '.php';
		}
	}
	
	function _view($url) {
		if (file_exists(VIEW . $this->path[2] . '.php') && $url == $this->path[2]) {
			include VIEW . $this->path[2] . '.php';
		}
	}
		
	function _controller($url) {
		if (file_exists(CONTROLLER . $this->path[3] . '.php') && $url == $this->path[3]) {
			include CONTROLLER . $this->path[3] . '.php';
		}
	}*/

}
