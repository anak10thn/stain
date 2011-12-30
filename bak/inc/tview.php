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
class form {
	public function view ($array_label,$array_type,$array_name,$array_value,$array_class,$array_id,$input_tag) {
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


//-------------------------------------------------
class themes {
	public function view($themes){
		include (THEMES.$themes."/themes.php");
	}

	public function login($themes){
		include (THEMES.$themes."/login.php");
	}

	public function navigator($themes){
		include (THEMES.$themes."/navigator.php");
	}

	public function content($themes){
		include (THEMES.$themes."/content.php");
	}
	
	public function js($themes,$source){
		echo ("<script src='".HOSTNAME.THEMES.$themes."/js/".$source.".js'></script>\n");
	}

	public function css($themes){
		echo ("<link rel='stylesheet' type='text/css' href='".HOSTNAME.THEMES.$themes."/css/default.css'>\n");
	}
	
	public function css_costum($themes,$source){
		echo ("<link rel='stylesheet' type='text/css' href='".HOSTNAME.THEMES.$themes."/css/".$css_source.".css'>\n");
	}

}

class action {
	public function dialogbox($message) {
		echo ("<script type='text/javascript'> alert('".$message."') </script>");
	}
	public function dialogbox_direct($message,$url_direct) {
		echo ("<script type='text/javascript'> alert('".$message."') </script>
			   <meta http-equiv='refresh' content='0;url=".$url_direct."'>");
	}
	public function direct($url_direct) {
		echo ("<meta http-equiv='refresh' content='0;url=".$url_direct."'>");
	}
}

class icon {
	public function delete($themes){
		echo ("<img src='".HOSTNAME.THEMES."default/images/icon/delete.png'>");
	}
	public function update($themes){
		echo ("<img src='".HOSTNAME.THEMES."default/images/icon/update.png'>");
	}
}

class tcake_view {
	public static function show($show) {
		return new $show;
	}
}
?>
