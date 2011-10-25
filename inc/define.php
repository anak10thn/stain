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
define('DIR','stain/');
define('ROOT',$_SERVER['DOCUMENT_ROOT']);
define('HOST',ROOT.'/'.DIR);
define('HOSTNAME',"http://".$_SERVER['HTTP_HOST']."/".DIR);
define('PLUGIN','plugin/');
define('ADMIN','admin/');
define('INSTALL','install/');
define('INC','inc/');
define('JS','inc/js/');
define('THEMES','themes/');
define('CONF',HOST.'inc/config.php');
define('VIEW',HOST.'inc/tview.php');
define('MODEL',HOST.'inc/tmodel.php');
define('CONTROLLER',HOST.'inc/tcontroller.php');
?>
