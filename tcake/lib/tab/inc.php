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
function tab($page){
		echo ("	<ul>");
		
				if (file_exists("plugin/".$page."/form.php")){
					echo ("<li><a href='#tabs-1'>Form Input ".ucfirst($page)."</a></li>");
				}
				if (file_exists("plugin/".$page."/report.php")){
					echo ("<li><a href='#tabs-2'>Raport ".ucfirst($page)."</a></li>");
				}
				if (file_exists("plugin/".$page."/import.php")){
					echo ("<li><a href='#tabs-3'>Import Data ".ucfirst($page)."</a></li>");
				}
				if (file_exists("plugin/".$page."/export.php")){
					echo ("<li><a href='#tabs-4'>Export Data ".ucfirst($page)."</a></li>");
				}
				
		echo ("</ul>");
		if (file_exists("plugin/".$page."/form.php")){
			echo ("<div id='tabs-1'><p>");
				include ("plugin/".$page."/form.php");
			echo ("</p></div>");
		}
		if (file_exists("plugin/".$page."/report.php")){
		echo ("<div id='tabs-2'><p>");
			include ("plugin/".$page."/report.php");
		echo ("</p></div>");
		}
		if (file_exists("plugin/".$page."/import.php")){
		echo ("<div id='tabs-3'><p>");
			include ("plugin/".$page."/import.php");
		echo ("</p></div>");
		}
		if (file_exists("plugin/".$page."/export.php")){
		echo ("<div id='tabs-4'><p>");
			include ("plugin/".$page."/export.php");
		echo ("</p></div>");
		}
}

?>
