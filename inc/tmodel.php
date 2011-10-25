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
class jlib {
	public function source($source){
		$jlib = "jlib/".$source."/inc.php";
		return $jlib;
	}
}

class lib {
	public function source($source){
		$lib = "lib/".$source."/inc.php";
	}
}
class jquery {
	public function source(){
		echo ("<script src='".HOSTNAME."inc/js/jquery.js'></script>\n");
	}

	public function source_min(){
		echo ("<script src='".HOSTNAME."inc/js/jquery.min.js'></script>\n");
	}

	public function ui(){
		echo ("<script src='".HOSTNAME."inc/js/ui/jquery-ui.js'></script>\n");
	}
	public function ui_costume($source){
		echo ("<script src='".HOSTNAME."inc/js/ui/jquery.ui.{$js_source}.js'></script>\n");
	}

	public function css($source){
		echo ("<link rel='stylesheet' type='text/css' href='".HOSTNAME."inc/css/widgets/".$source."/jquery.ui.all.css'>\n");
	}
}

class tcake_model {
	public static function jlib(){
		return new jlib;
	}
	public static function lib(){
		return new lib;
	}
	public static function jquery(){
		return new jquery;
	}
}
?>
