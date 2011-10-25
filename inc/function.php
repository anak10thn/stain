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




//content
function report(){
	include (INC."/report.php");
}
function setting(){
	include ("admin/setting.php");
}

//content

function ip_user() {
	if (getenv(HTTP_X_FORWARDED_FOR)) {
        $ip_address = getenv(HTTP_X_FORWARDED_FOR);
			} else {
				$ip_address = getenv(REMOTE_ADDR);
			}

	echo $ip_address;
}

function session(){
	if (!isset($_SESSION[user])){
	   echo	("<meta http-equiv='refresh' content='0;url=".HOSTNAME."index.php'>");
	}
}
public function jquery_min(){
	echo ("<script src='".HOSTNAME."inc/js/jquery.min.js'></script>\n");
}

public function jquery_ui_min(){
	echo ("<script src='".HOSTNAME."inc/js/jquery-ui.min.js'></script>\n");
}

//memunculkan kotak pesan


function del_image($themes){
	echo ("<img src='".HOSTNAME.THEMES."default/images/icon/delete.png'>");
}
function update_image($themes){
	echo ("<img src='".HOSTNAME.THEMES."default/images/icon/update.png'>");
}
function thn_ajaran(){
	$year_min= "2008";
	$year_maximum= date(Y) + 1;
	while ($year_min <= $year_maximum) {
		$year_max = $year_min + 1;
		if ($year_min != $year_maximum) {
		echo  ($year_min."/".$year_max."\n");
		}
		$year_min++;
	}
}
?>
