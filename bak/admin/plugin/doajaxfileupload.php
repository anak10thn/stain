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
include ("../../inc/define.php");
include (HOST.CONF);
include (HOST.FUNC);
conn_db($host,$user,$pass,$db);

$error = "";
$msg = "";
$fileElementName = 'fileToUpload';
$target_path="../../upload/".basename( $_FILES[$fileElementName]['name']);
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else
	{
			
			if (@move_uploaded_file($_FILES[$fileElementName]['tmp_name'],$target_path)){
			$zip = new ZipArchive;
				if ($zip->open($target_path) === TRUE) {
					$zip->extractTo('../../plugin/');
					$zip->close();
				}
			}
			
			$array_name_plugin = array(".zip",".ZIP");
			$name_plugin = str_replace($array_name_plugin,"",$_FILES['fileToUpload']['name']);
			$plugin_sql = "../../plugin/".$name_plugin."/".$name_plugin.".sql";
			include ("../../plugin/".$name_plugin."/info.php");
			if(file_exists($plugin_sql)){
				$file_open=fopen($plugin_sql,"r");
				$data=fread($file_open,filesize($plugin_sql));
				@fclose($file_open);
				@mysql_query($data);
				db_insert("plugin",array("plugin_name","description","position"),array("$name_plugin","$desc","$info"));
				$msg .= " Database: " . $name_plugin . ".sql, ";
			}
			else {
				db_insert("plugin",array("plugin_name","description","position"),array("$name_plugin","$desc","$info"));
			}
			$msg .= " Plugin Name: " . $name_plugin . ", ";
			$msg .= " Plugin Size: " . $_FILES['fileToUpload']['size'];
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES['fileToUpload']);	
			
		
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>
