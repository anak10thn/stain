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

$setting_query = db_select("setting");
while ($setting = mysql_fetch_array($setting_query)){
	$login_message = $setting[login_message];
	$themes_select = $setting[themes];
	$themes_content_select = $setting[content_themes];
}
//cek themes
$themes_file = getfile(THEMES);
$i = 0;
$count_themes_file = count($themes_file);
while ($i < $count_themes_file) {
	if ($themes_file[$i] != ".") {
		if ($themes_select == $themes_file[$i]){
			$themes_arr[] = $themes_file[$i]."*select";
		}
		else {
			$themes_arr[] = $themes_file[$i];
		}
	}
	$i++;
}
$themes = implode(":",$themes_arr);
//cek themes content
$themes_content_file = getfile("inc/css/widgets");
$j = 0;
$count_themes_content_file = count($themes_content_file);
while ($j < $count_themes_content_file) {
	if ($themes_content_file[$j] != ".") {
		if ($themes_content_select == $themes_content_file[$j]){
			$themes_content_arr[] = $themes_content_file[$j]."*select";
		}
		else {
			$themes_content_arr[] = $themes_content_file[$j];
		}
	}
	$j++;
}
$themes_content = implode(":",$themes_content_arr);

	$array_label = array("Pesan Login : ","Themes : ","Themes Content :","");
	$array_type = array("textarea","select","select","submit");
	$array_name = array("login_message","themes","content_themes","kirim");
	$array_value = array($login_message,$themes,$themes_content,"Submit");
	$array_class = "effect";
	$array_id = "text";
	$input_tag = array("<tr><td><fieldset>:</fieldset></td></tr>","<tr><td><fieldset>:</fieldset></td></tr>","<tr><td><fieldset>:</fieldset></td></tr>","<tr><td><div id='button'>:</div></td></tr>");
	echo ("<form  id='updatetheme' action='".HOSTNAME."admin/setting/update.php' method='POST'><center><table border='0>'");
	form_input($array_label,$array_type,$array_name,$array_value,$array_class,$array_id,$input_tag);
	echo ("</table></center></form>");

?>
