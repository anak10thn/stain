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
	public $core, $driver, $host, $user, $pass, $dbase, $wgets;
	
	function __construct() {
		require_once TCAKE . 'config.php';
		$this->driver = $_CONFIG['driver'];
		$this->host = $_CONFIG['host'];
		$this->user = $_CONFIG['user'];
		$this->pass = $_CONFIG['pass'];
		$this->dbase = $_CONFIG['dbase'];
		$this->wgets = $_CONFIG['wgets'];
		$this->core = TCAKE;
	}
	
	function driver() {
		require_once $this->core . 'driver/' . $this->driver . '.php';
	}
	
	function js($js_val) {
		$js = "<script type='text/javascript' src='". HOSTNAME . "tcake/js/". $js_val .".js'></script>";
		return $js;
	}
	
	function lib($lib_val) {
		include ($this->core . "lib/" . $lib_val . "/inc.php");
	}
	
	function jlib($jlib_val) {
		include ($this->core . "jlib/" . $jlib_val . "/inc.php");
	}
	
	function style() {
		$style = "<link type='text/css' href='". HOSTNAME . "tcake/style/". $this->wgets ."/jquery.ui.all.css' rel='stylesheet' />";
		return $style;
	}
	
	function ui() {
		$ui = "<script type='text/javascript' src='". HOSTNAME . "tcake/ui/jquery.ui.js'></script>";
		return $ui;
	}
	
	function path() {
		$path = explode("/",$_SERVER['PATH_INFO']);
		return $path;
	}
	
	function direct($url_direct) {
		$direct = "<meta http-equiv='refresh' content='0;url=".$url_direct."'>";
		return $direct;
	}
	
	function dialogbox($message) {
		$dialogbox = "<script type='text/javascript'> alert('".$message."') </script>";
		return $dialogbox;
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

