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
class db {
	private $host,$user,$pass,$dbase,$status;
	public $query;
	
	function __construct($host,$user,$pass,$dbase) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->status = mysql_connect($this->host,$this->user,$this->pass);
		$this->dbase = mysql_select_db($dbase) or die mysql_error();
	}
	function chkcon() {
		
		if ($this->status)
			echo "1";
		else 
			echo "0";
		
	}
	function query() {
		mysql_query($this->query);
	}
	
}
?>
